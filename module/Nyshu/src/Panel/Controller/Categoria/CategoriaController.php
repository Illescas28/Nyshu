<?php

namespace Panel\Controller\Categoria;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Form ////
use Panel\Forms\Categoria\CategoriaForm;

//// Filter ////
use  Panel\Filters\Categoria\CategoriaFilter;

//// Propel ////
use Category;
use CategoryQuery;
use BasePeer;

class CategoriaController extends AbstractActionController
{
    public function nuevoAction()
    {
        session_start();
        if($_SESSION['user_name'] == 'nyshu'){
            $this->layout('layout/layoutPanel');
            $CategoriaForm = new CategoriaForm();
            $CategoriaForm->get('submit')->setValue('Nuevo');

            $request = $this->getRequest();
            if ($request->isPost()) {

                $CategoriaFilter = new CategoriaFilter();
                $CategoriaForm->setInputFilter($CategoriaFilter->getInputFilter());
                $CategoriaForm->setData($request->getPost());

                if ($CategoriaForm->isValid()) {
                    $Categoria = new Category();
                    foreach($CategoriaForm->getData() as $CategoriaKey => $CategoriaValue){
                        if($CategoriaKey != 'idcategory' && $CategoriaKey != 'submit'){
                            $Categoria->setByName($CategoriaKey, $CategoriaValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    $Categoria->save();
                    return $this->redirect()->toRoute('panel-categoria');
                }
            }
            return array('categoriaForm' => $CategoriaForm);
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
            // Instanciamos nuestro formulario categoriaForm
            $categoriaForm = new CategoriaForm();

            // Guardamos en un arrglo los campos a los que el usuario va poder tener acceso de acuerdo a su nivel
            $allowedColumns = array();
            foreach ($categoriaForm->getElements() as $key=>$value){
                array_push($allowedColumns, $key);
            }
            //Verificamos que si nos envian filtros  si no ponemos valores por default
            $limit = (int) $this->params()->fromQuery('limit') ? (int)$this->params()->fromQuery('limit')  : 100;
            if($limit > 100) $limit = 100; //Si el limit es mayor a 100 lo establece en 100 como maximo valor permitido
            $dir = $this->params()->fromQuery('dir') ? $this->params()->fromQuery('dir')  : 'asc';
            $order = in_array($this->params()->fromQuery('order'), $allowedColumns) ? $this->params()->fromQuery('order')  : 'idcategory';
            $page = (int) $this->params()->fromQuery('page') ? (int)$this->params()->fromQuery('page')  : 1;

            $categoriaQuery = new CategoryQuery();

            //Order y Dir
            if($order !=null || $dir !=null){
                $categoriaQuery->orderBy($order, $dir);
            }

            // Obtenemos el filtrado por medio del idcompany del recurso.
            $result = $categoriaQuery->paginate($page,$limit);

            $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'categorias' => $data,
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
                return $this->redirect()->toRoute('panel-categoria', array(
                    'action' => 'nuevo'
                ));
            }

            //Instanciamos nuestra categoriaQuery
            $categoriaQuery = CategoryQuery::create();

            //Verificamos que el Id categoria que se quiere modificar exista
            if($categoriaQuery->create()->filterByIdcategory($id)->exists()){

                $request = $this->getRequest();
                //Instanciamos nuestra categoriaQuery
                $categoriaPKQuery = $categoriaQuery->findPk($id);
                $categoriaQueryArray = $categoriaPKQuery->toArray(BasePeer::TYPE_FIELDNAME);
                $CategoriaForm = new CategoriaForm();
                $ElementsCategoriaForm = $CategoriaForm->getElements();

                if ($request->isPost()){
                    $CategoriaArray = array();
                    foreach($ElementsCategoriaForm as $key=>$value){
                        if($key != 'submit'){
                            $CategoriaArray[$key] = $request->getPost()->$key ? $request->getPost()->$key : $categoriaQueryArray[$key];
                        }
                    }
                }else{
                    foreach($categoriaQueryArray as $categoriaQueryKey => $categoriaQueryValue){
                        $CategoriaArray[$categoriaQueryKey] = $categoriaQueryArray[$categoriaQueryKey];

                    }
                }

                $CategoriaFilter = new CategoriaFilter();
                $CategoriaForm->setInputFilter($CategoriaFilter->getInputFilter());
                $CategoriaForm->setData($CategoriaArray);

                if ($CategoriaForm->isValid()) {
                    foreach($CategoriaForm->getData() as $CategoriaKey => $CategoriaValue){
                        if($CategoriaKey != 'submit'){
                            $categoriaPKQuery->setByName($CategoriaKey, $CategoriaValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    // Si no modifican nada, permanecemos en el formulario.
                    if($categoriaPKQuery->isModified()){
                        $categoriaPKQuery->save();
                        return $this->redirect()->toRoute('panel-categoria');
                    }
                }else{
                    $messageArray = array();
                    foreach ($CategoriaForm->getMessages() as $key => $value){
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
                'categoriaForm' => $CategoriaForm,
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
                return $this->redirect()->toRoute('panel-categoria');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Yes') {
                    $id = (int) $request->getPost('id');
                    CategoryQuery::create()->filterByIdcategory($id)->delete();
                }

                // Redireccionamos a los provedores
                return $this->redirect()->toRoute('panel-categoria');
            }

            $provedorEntity = CategoryQuery::create()->filterByIdcategory($id)->findOne();
            return array(
                'id'    => $id,
                'categoria' => $provedorEntity->toArray(BasePeer::TYPE_FIELDNAME)
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
