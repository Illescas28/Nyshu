<?php

namespace Panel\Controller\ProductoFoto;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Form ////
use Panel\Forms\ProductoFoto\ProductoFotoForm;

//// Filter ////
use  Panel\Filters\ProductoFoto\ProductoFotoFilter;

//// Propel ////
use Productphoto;
use ProductphotoQuery;
use BasePeer;

class ProductoFotoController extends AbstractActionController
{
    public function nuevoAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');

            //Instanciamos nuestra productoQuery
            $productQuery = \ProductQuery::create()->find();
            $productosArray = array();
            foreach($productQuery->toArray(null,false,BasePeer::TYPE_FIELDNAME) as $categoryEntity){
                $productosArray[$categoryEntity['idproduct']] = $categoryEntity['product_name'];
            }
            $ProductoFotoForm = new ProductoFotoForm($productosArray);
            $ProductoFotoForm->get('submit')->setValue('Nuevo');

            $request = $this->getRequest();
            if ($request->isPost()) {

                // Almacenamos en una variable de tipo array los datos que nos mandan por post (no almacena archivos)
                $nonFile = $request->getPost()->toArray();
                // Obtenemos los detalles del archivo
                $File = $this->params()->fromFiles('productphoto_img');
                // Creamos un array conjuntando los datos del post y el archivo
                $data = array_merge(
                    $nonFile, //POST
                    array('productphoto_img'=> $File['name']) //FILE...
                );

                $ProductoFotoFilter = new ProductoFotoFilter();
                $ProductoFotoForm->setInputFilter($ProductoFotoFilter->getInputFilter());
                $ProductoFotoForm->setData($data);

                foreach($data as $key => $value){

                    if($key == 'idproduct'){
                        $articuloQuery = \ProductQuery::create()->filterByIdproduct($value)->findOne();
                        // Validamos que exista el idarticulo.
                        if(!$articuloQuery){
                            return array(
                                'productoFotoForm' => $ProductoFotoForm,
                                'Error' => 'Invalid idproduct.'
                            );
                        }
                    }
                }

                if ($ProductoFotoForm->isValid()) {

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
                        $ProductoFotoForm->setMessages(array('productphoto_img'=>$error ));
                    } else {
                        $adapter->setDestination(IMG_PRODUCTOS);
                        if ($adapter->receive($File['name'])) {
                            // Guardamos la imagen en IMG_PRODUCTOS
                        }
                    }

                    $ProductoFoto = new Productphoto();
                    foreach($ProductoFotoForm->getData() as $ProductoFotoKey => $ProductoFotoValue){
                        if($ProductoFotoKey != 'idproductphoto' && $ProductoFotoKey != 'submit'){
                            if($ProductoFotoKey == 'productphoto_img'){
                                $ProductoFoto->setProductphotoImg('/img/products/'.$ProductoFotoValue);
                            }else{
                                $ProductoFoto->setByName($ProductoFotoKey, $ProductoFotoValue, BasePeer::TYPE_FIELDNAME);
                            }
                        }
                    }
                    $ProductoFoto->save();
                    return $this->redirect()->toRoute('panel-producto-foto');
                }
            }
            return array('productoFotoForm' => $ProductoFotoForm);
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
            // Instanciamos nuestro formulario productoFotoForm
            $productoFotoForm = new ProductoFotoForm();

            // Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel
            $allowedColumns = array();
            foreach ($productoFotoForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }
            //Verificamos que si nos envian filtros  si no ponemos valores por default
            $limit = (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 100;
            if($limit > 100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir = $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order = in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idproductphoto';
            $page = (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;

            $productoFotoQuery = new ProductphotoQuery();

            //Order y Dir
            if($order !=null || $dir !=null){
                $productoFotoQuery->orderBy($order, $dir);
            }

            // Obtenemos el filtrado por medio del idcompany del recurso.
            $result = $productoFotoQuery->paginate($page,$limit);

            //$data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'productoFotos' => $result,
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
                return $this->redirect()->toRoute('panel-producto-foto', array(
                    'action' => 'nuevo'
                ));
            }

            //Instanciamos nuestra productoFotoQuery
            $productoFotoQuery = ProductphotoQuery::create();

            //Verificamos que el Id productoFoto que se quiere modificar exista
            if($productoFotoQuery->create()->filterByIdproduct($id)->exists()){

                $request = $this->getRequest();
                //Instanciamos nuestra productoFotoQuery
                $productoFotoPKQuery = $productoFotoQuery->findPk($id);
                $productoFotoQueryArray = $productoFotoPKQuery->toArray(BasePeer::TYPE_FIELDNAME);
                $ProductoFotoForm = new ProductoFotoForm();
                $ElementsProductoFotoForm = $ProductoFotoForm->getElements();

                if ($request->isPost()){
                    $ProductoFotoArray = array();
                    foreach($ElementsProductoFotoForm as $key=>$value){
                        if($key != 'submit'){
                            $ProductoFotoArray[$key] = $request->getPost()->$key ? $request->getPost()->$key : $productoFotoQueryArray[$key];
                        }
                    }
                }else{
                    foreach($productoFotoQueryArray as $productoFotoQueryKey => $productoFotoQueryValue){
                        $ProductoFotoArray[$productoFotoQueryKey] = $productoFotoQueryArray[$productoFotoQueryKey];

                    }
                }

                $ProductoFotoFilter = new ProductoFotoFilter();
                $ProductoFotoForm->setInputFilter($ProductoFotoFilter->getInputFilter());
                $ProductoFotoForm->setData($ProductoFotoArray);

                if ($ProductoFotoForm->isValid()) {
                    foreach($ProductoFotoForm->getData() as $ProductoFotoKey => $ProductoFotoValue){
                        if($ProductoFotoKey != 'submit'){
                            $productoFotoPKQuery->setByName($ProductoFotoKey, $ProductoFotoValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    // Si no modifican nada, permanecemos en el formulario.
                    if($productoFotoPKQuery->isModified()){
                        $productoFotoPKQuery->save();
                        return $this->redirect()->toRoute('panel-producto-foto');
                    }
                }else{
                    $messageArray = array();
                    foreach ($ProductoFotoForm->getMessages() as $key => $value){
                        foreach($value as $val){
                            //Obtenemos el valor de la columna con error
                            $message = $key.' '.$val;
                            array_push($messageArray, $message);
                        }
                    }

                    return new ViewModel(array(
                        'Error' => $messageArray,
                    ));
                }
            }

            return array(
                'id' => $id,
                'productoFotoForm' => $ProductoFotoForm,
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
                return $this->redirect()->toRoute('panel-producto-foto');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Si') {
                    $id = (int) $request->getPost('id');
                    $ProductphotoQuery = ProductphotoQuery::create()->filterByIdproductphoto($id)->findOne();
                    // Almacenamos la ruta en donde se encuentra el archivo que remplasaremos.
                    $dirFile = DELETE_IMG.$ProductphotoQuery->getProductphotoImg();
                    if(unlink($dirFile)){//El archivo fue borrado.
                        ProductphotoQuery::create()->filterByIdproductphoto($id)->delete();
                    }else{
                        ProductphotoQuery::create()->filterByIdproductphoto($id)->delete();
                    }
                }

                // Redireccionamos a las fotos
                return $this->redirect()->toRoute('panel-producto-foto');
            }

            $productoFotoEntity = ProductphotoQuery::create()->filterByIdproductphoto($id)->findOne();
            return array(
                'id'    => $id,
                'productoFoto' => $productoFotoEntity
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
