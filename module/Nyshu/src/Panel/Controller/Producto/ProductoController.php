<?php

namespace Panel\Controller\Producto;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Form ////
use Panel\Forms\Producto\ProductoForm;

//// Filter ////
use  Panel\Filters\Producto\ProductoFilter;

//// Propel ////
use Product;
use ProductQuery;
use BasePeer;

class ProductoController extends AbstractActionController
{
    public function nuevoAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');

            //Instanciamos nuestra CategoryQuery
            $categoryQuery = \CategoryQuery::create()->find();
            $categoriesArray = array();
            foreach($categoryQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME) as $categoryEntity){
                $categoriesArray[$categoryEntity['idcategory']] = $categoryEntity['category_name'];
            }
            $ProductoForm = new ProductoForm($categoriesArray);
            $ProductoForm->get('submit')->setValue('Nuevo');

            $request = $this->getRequest();
            if ($request->isPost()) {

                // Almacenamos en una variable de tipo array los datos que nos mandan por post (no almacena archivos)
                $nonFile = $request->getPost()->toArray();
                // Obtenemos los detalles del archivo
                $File = $this->params()->fromFiles('product_img');

                // Creamos un array conjuntando los datos del post y el archivo
                $data = array_merge(
                    $nonFile, //POST
                    array('product_img'=> $File['name']) //FILE...
                );

                $ProductoFilter = new ProductoFilter();
                $ProductoForm->setInputFilter($ProductoFilter->getInputFilter());
                $ProductoForm->setData($data);

                foreach($data as $key => $value){

                    if($key == 'idcategory'){
                        $categoryQuery = \CategoryQuery::create()->filterByIdcategory($value)->findOne();
                        // Validamos que exista el idarticulo.
                        if(!$categoryQuery){
                            return array(
                                'productoForm' => $ProductoForm,
                                'Error' => 'Invalid idcategory.'
                            );
                        }
                    }
                }

                if ($ProductoForm->isValid()) {

                    $size = new \Zend\Validator\File\Size(array('max'=>2000000)); //maximo bytes filesize
                    $adapter = new \Zend\File\Transfer\Adapter\Http();
                    $adapter->setValidators(array($size), $File['name']);

                    if (!$adapter->isValid()){
                        $dataError = $adapter->getMessages();
                        $error = array();
                        foreach($dataError as $key=>$row)
                        {
                            $error[] = $row;
                        } //seteamos formElementErrors
                        $ProductoForm->setMessages(array('product_img'=>$error ));
                        return array('productoForm' => $ProductoForm);
                    } else {
                        $adapter->setDestination(IMG_PRODUCTOS);
                        if ($adapter->receive($File['name'])) {
                            // Guardamos la imagen en IMG_PRODUCTOS
                        }
                    }

                    $Producto = new Product();
                    foreach($ProductoForm->getData() as $ProductoKey => $ProductoValue){
                        if($ProductoKey != 'idproduct' && $ProductoKey != 'submit'){
                            if($ProductoKey == 'product_img'){
                                $Producto->setProductImg('/img/products/'.$ProductoValue);
                            }else{
                                $Producto->setByName($ProductoKey, $ProductoValue, BasePeer::TYPE_FIELDNAME);
                            }
                        }
                    }
                    $Producto->save();
                    return $this->redirect()->toRoute('panel-producto');
                }
            }

            return array(
                'productoForm' => $ProductoForm,
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }

    public function listarAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');
            $productoQuery = new ProductQuery();

            // Obtenemos el filtrado por medio del idcompany del recurso.
            $result = $productoQuery->find();

            //$data = $result->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'productos' => $result,
            ));
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }

    public function editarAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');
            $id = (int) $this->params()->fromRoute('id', 0);
            if (!$id) {
                return $this->redirect()->toRoute('panel-producto', array(
                    'action' => 'nuevo'
                ));
            }

            //Instanciamos nuestra productoQuery
            $productoQuery = ProductQuery::create();

            //Verificamos que el Id producto que se quiere modificar exista
            if($productoQuery->create()->filterByIdproduct($id)->exists()){

                $request = $this->getRequest();
                //Instanciamos nuestra productoQuery
                $productoPKQuery = $productoQuery->findPk($id);
                $productoQueryArray = $productoPKQuery->toArray(BasePeer::TYPE_FIELDNAME);
                //Instanciamos nuestra CategoryQuery
                $categoryQuery = \CategoryQuery::create()->find();
                $categoriesArray = array();
                foreach($categoryQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME) as $categoryEntity){
                    $categoriesArray[$categoryEntity['idcategory']] = $categoryEntity['category_name'];
                }
                $ProductoForm = new ProductoForm($categoriesArray);
                $ElementsProductoForm = $ProductoForm->getElements();

                if ($request->isPost()){
                    // Almacenamos en una variable de tipo array los datos que nos mandan por post (no almacena archivos)
                    $nonFile = $request->getPost()->toArray();
                    // Obtenemos los detalles del archivo
                    $File = $this->params()->fromFiles('product_img');

                    // Creamos un array conjuntando los datos del post y el archivo
                    $data = array_merge(
                        $nonFile, //POST
                        array('product_img'=> $File['name']) //FILE...
                    );

                    $ProductoArray = array();
                    foreach($ElementsProductoForm as $key=>$value){
                        if($key != 'submit'){
                            $ProductoArray[$key] = $data[$key] ? $data[$key] : $productoQueryArray[$key];
                        }
                    }
                }else{
                    foreach($productoQueryArray as $productoQueryKey => $productoQueryValue){
                        $ProductoArray[$productoQueryKey] = $productoQueryArray[$productoQueryKey];

                    }
                }

                $ProductoFilter = new ProductoFilter();
                $ProductoForm->setInputFilter($ProductoFilter->getInputFilter());
                $ProductoForm->setData($ProductoArray);
                $ProductoForm->getInputFilter()->get('product_img')->setRequired('false');

                if ($ProductoForm->isValid()) {

                    if($File['name'] != null){
                        $size = new \Zend\Validator\File\Size(array('max'=>2000000)); //maximo bytes filesize
                        $adapter = new \Zend\File\Transfer\Adapter\Http();
                        $adapter->setValidators(array($size), $File['name']);

                        if (!$adapter->isValid()){
                            $dataError = $adapter->getMessages();
                            $error = array();
                            foreach($dataError as $key=>$row)
                            {
                                $error[] = $row;
                            } //seteamos formElementErrors
                            $ProductoForm->setMessages(array('product_img'=>$error ));
                            return array(
                                'id' => $id,
                                'productoForm' => $ProductoForm,
                            );
                        } else {
                            $adapter->setDestination(IMG_PRODUCTOS);
                            if ($adapter->receive($File['name'])) {
                                // Guardamos la imagen en IMG_PRODUCTOS
                            }
                            if($productoPKQuery->getProductImg() != "/img/products/".$File['name']){
                                foreach($ProductoForm->getData() as $ProductoKey => $ProductoValue){
                                    if($ProductoKey != 'submit'){
                                        if($ProductoKey == 'product_img'){// Almacenamos la ruta en donde se encuentra el archivo que remplasaremos.
                                            $dirFile = DELETE_IMG.$productoPKQuery->getProductImg();
                                            if(unlink($dirFile)){//El archivo fue borrado.
                                                $productoPKQuery->setProductImg('/img/products/'.$ProductoValue);
                                            }else{
                                                $productoPKQuery->setProductImg('/img/products/'.$ProductoValue);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    foreach($ProductoForm->getData() as $ProductoKey => $ProductoValue){
                        if($ProductoKey != 'submit' && $ProductoKey != 'product_img'){
                            $productoPKQuery->setByName($ProductoKey, $ProductoValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    // Si no modifican nada, permanecemos en el formulario.
                    if($productoPKQuery->isModified()){
                        $productoPKQuery->save();
                        return $this->redirect()->toRoute('panel-producto');
                    }
                }
            }

            return array(
                'id' => $id,
                'productoForm' => $ProductoForm,
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }

    public function eliminarAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');
            $id = (int) $this->params()->fromRoute('id', 0);
            if (!$id) {
                return $this->redirect()->toRoute('panel-producto');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Si') {
                    $id = (int) $request->getPost('id');
                    $ProductQuery = ProductQuery::create()->filterByIdproduct($id)->findOne();
                    // Almacenamos la ruta en donde se encuentra el archivo que remplasaremos.
                    $dirFile = DELETE_IMG.$ProductQuery->getProductImg();
                    if(unlink($dirFile)){//El archivo fue borrado.
                        ProductQuery::create()->filterByIdproduct($id)->delete();
                    }else{
                        ProductQuery::create()->filterByIdproduct($id)->delete();
                    }
                }

                // Redireccionamos a los producto
                return $this->redirect()->toRoute('panel-producto');
            }

            $productoEntity = ProductQuery::create()->filterByIdproduct($id)->findOne();
            return array(
                'id'    => $id,
                'producto' => $productoEntity
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
