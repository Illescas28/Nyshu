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
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');
            $icons = array(
                'pastel' => 'pastel',
                'cupcake' => 'cupcake',
                'brownie' => 'brownie',
                'rosca' => 'rosca',
                'gelatina' => 'gelatina',
                'hotcake' => 'hotcake',
                'null' => 'nada',
            );

            $CategoriaForm = new CategoriaForm($icons);
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
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');

            $categoriaQuery = new CategoryQuery();

            $result = $categoriaQuery->paginate(1,50000);

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
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
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

                $icons = array(
                    'pastel' => 'pastel',
                    'cupcake' => 'cupcake',
                    'brownie' => 'brownie',
                    'rosca' => 'rosca',
                    'gelatina' => 'gelatina',
                    'hotcake' => 'hotcake',
                    'pay' => 'pay',
                    'null' => 'nada',
                );

                $CategoriaForm = new CategoriaForm($icons);
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
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');
            $id = (int) $this->params()->fromRoute('id', 0);
            if (!$id) {
                return $this->redirect()->toRoute('panel-categoria');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Si') {
                    $id = (int) $request->getPost('id');
                    CategoryQuery::create()->filterByIdcategory($id)->delete();
                }

                // Redireccionamos a los categorias
                return $this->redirect()->toRoute('panel-categoria');
            }

            $categoriaEntity = CategoryQuery::create()->filterByIdcategory($id)->findOne();
            return array(
                'id'    => $id,
                'categoria' => $categoriaEntity->toArray(BasePeer::TYPE_FIELDNAME)
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
