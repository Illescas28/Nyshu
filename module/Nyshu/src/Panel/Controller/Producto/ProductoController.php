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
        if($_SESSION['user_name'] == 'nyshu'){
            $this->layout('layout/layoutPanel');
            $ProductoForm = new ProductoForm();
            $ProductoForm->get('submit')->setValue('Nuevo');

            $request = $this->getRequest();
            if ($request->isPost()) {

                $ProductoFilter = new ProductoFilter();
                $ProductoForm->setInputFilter($ProductoFilter->getInputFilter());
                $ProductoForm->setData($request->getPost());

                foreach($request->getPost() as $key => $value){

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
                    $Producto = new Product();
                    foreach($ProductoForm->getData() as $ProductoKey => $ProductoValue){
                        if($ProductoKey != 'idproduct' && $ProductoKey != 'submit'){
                            $Producto->setByName($ProductoKey, $ProductoValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    $Producto->save();
                    return $this->redirect()->toRoute('panel-producto');
                }
            }
            return array('productoForm' => $ProductoForm);
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }

    public function listarAction()
    {
        session_start();
        if($_SESSION['user_name'] == 'nyshu'){
            $this->layout('layout/layoutPanel');
            // Instanciamos nuestro formulario productoForm
            $productoForm = new ProductoForm();

            // Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel
            $allowedColumns = array();
            foreach ($productoForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }
            //Verificamos que si nos envian filtros  si no ponemos valores por default
            $limit = (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 100;
            if($limit > 100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir = $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order = in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idproduct';
            $page = (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;

            $productoQuery = new ProductQuery();

            //Order y Dir
            if($order !=null || $dir !=null){
                $productoQuery->orderBy($order, $dir);
            }

            // Obtenemos el filtrado por medio del idcompany del recurso.
            $result = $productoQuery->paginate($page,$limit);

            $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'productos' => $data,
            ));
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }

    public function editarAction()
    {
        session_start();
        if($_SESSION['user_name'] == 'nyshu'){
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
                $ProductoForm = new ProductoForm();
                $ElementsProductoForm = $ProductoForm->getElements();

                if ($request->isPost()){
                    $ProductoArray = array();
                    foreach($ElementsProductoForm as $key=>$value){
                        if($key != 'submit'){
                            $ProductoArray[$key] = $request->getPost()->$key ? $request->getPost()->$key : $productoQueryArray[$key];
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

                if ($ProductoForm->isValid()) {
                    foreach($ProductoForm->getData() as $ProductoKey => $ProductoValue){
                        if($ProductoKey != 'submit'){
                            $productoPKQuery->setByName($ProductoKey, $ProductoValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    // Si no modifican nada, permanecemos en el formulario.
                    if($productoPKQuery->isModified()){
                        $productoPKQuery->save();
                        return $this->redirect()->toRoute('panel-producto');
                    }
                }else{
                    $messageArray = array();
                    foreach ($ProductoForm->getMessages() as $key => $value){
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
        if($_SESSION['user_name'] == 'nyshu'){
            $this->layout('layout/layoutPanel');
            $id = (int) $this->params()->fromRoute('id', 0);
            if (!$id) {
                return $this->redirect()->toRoute('panel-producto');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Yes') {
                    $id = (int) $request->getPost('id');
                    ProductQuery::create()->filterByIdproduct($id)->delete();
                }

                // Redireccionamos a los provedores
                return $this->redirect()->toRoute('panel-producto');
            }

            $provedorEntity = ProductQuery::create()->filterByIdproduct($id)->findOne();
            return array(
                'id'    => $id,
                'producto' => $provedorEntity->toArray(BasePeer::TYPE_FIELDNAME)
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
