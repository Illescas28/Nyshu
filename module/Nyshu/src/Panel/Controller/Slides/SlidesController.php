<?php

namespace Panel\Controller\Slides;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Form ////
use Panel\Forms\Slides\SlidesForm;

//// Filter ////
use  Panel\Filters\Slides\SlidesFilter;

//// Propel ////
use Slides;
use SlidesQuery;
use BasePeer;

class SlidesController extends AbstractActionController
{
    public function nuevoAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');
            $slidesForm = new SlidesForm();
            $slidesForm->get('submit')->setValue('Nuevo');

            $request = $this->getRequest();
            if ($request->isPost()) {

                // Almacenamos en una variable de tipo array los datos que nos mandan por post (no almacena archivos)
                $nonFile = $request->getPost()->toArray();
                // Obtenemos los detalles del archivo
                $File = $this->params()->fromFiles('slides_img');

                // Creamos un array conjuntando los datos del post y el archivo
                $data = array_merge(
                    $nonFile, //POST
                    array('slides_img'=> $File['name']) //FILE...
                );

                $slidesFilter = new SlidesFilter();
                $slidesForm->setInputFilter($slidesFilter->getInputFilter());
                $slidesForm->setData($data);

                if ($slidesForm->isValid()) {

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
                        $slidesForm->setMessages(array('slides_img'=>$error ));
                        return array('SlidesForm' => $slidesForm);
                    } else {
                        $adapter->setDestination(IMG_SLIDES);
                        if ($adapter->receive($File['name'])) {
                            // Guardamos la imagen en IMG_SLIDES
                        }
                    }

                    $slides = new Slides();
                    foreach($slidesForm->getData() as $slidesKey => $slidesValue){
                        if($slidesKey != 'idslides' && $slidesKey != 'submit'){
                            if($slidesKey == 'slides_img'){
                                $slides->setSlidesImg('/img/slides/'.$slidesValue);
                            }else{
                                $slides->setByName($slidesKey, $slidesValue, BasePeer::TYPE_FIELDNAME);
                            }
                        }
                    }
                    $slides->save();
                    return $this->redirect()->toRoute('panel-slides');
                }
            }
            return array('SlidesForm' => $slidesForm);
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
            $slidesQuery = new SlidesQuery();

            // Obtenemos el filtrado por medio del idcompany del recurso.
            $result = $slidesQuery->paginate(1,50000);

            $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'slides' => $data,
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
                return $this->redirect()->toRoute('panel-slides', array(
                    'action' => 'nuevo'
                ));
            }

            //Instanciamos nuestra slidesQuery
            $slidesQuery = SlidesQuery::create();

            //Verificamos que el Id slides que se quiere modificar exista
            if($slidesQuery->create()->filterByIdslides($id)->exists()){

                $request = $this->getRequest();
                //Instanciamos nuestra $slidesQuery
                $slidesPKQuery = $slidesQuery->findPk($id);
                $slidesQueryArray = $slidesPKQuery->toArray(BasePeer::TYPE_FIELDNAME);
                $slidesForm = new SlidesForm();
                $ElementsSlidesForm = $slidesForm->getElements();

                if ($request->isPost()){
                    // Almacenamos en una variable de tipo array los datos que nos mandan por post (no almacena archivos)
                    $nonFile = $request->getPost()->toArray();
                    // Obtenemos los detalles del archivo
                    $File = $this->params()->fromFiles('slides_img');

                    // Creamos un array conjuntando los datos del post y el archivo
                    $data = array_merge(
                        $nonFile, //POST
                        array('slides_img'=> $File['name']) //FILE...
                    );

                    $slidesArray = array();
                    foreach($ElementsSlidesForm as $key=>$value){
                        if($key != 'submit'){
                            $slidesArray[$key] = $data[$key] ? $data[$key] : $slidesQueryArray[$key];
                        }
                    }
                }else{
                    foreach($slidesQueryArray as $slidesQueryKey => $slidesQueryValue){
                        $slidesArray[$slidesQueryKey] = $slidesQueryArray[$slidesQueryKey];

                    }
                }

                $slidesFilter = new SlidesFilter();
                $slidesForm->setInputFilter($slidesFilter->getInputFilter());
                $slidesForm->setData($slidesArray);
                $slidesForm->getInputFilter()->get('slides_img')->setRequired('false');

                if ($slidesForm->isValid()) {

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
                            $slidesForm->setMessages(array('slides_img'=>$error ));
                            return array(
                                'id' => $id,
                                'SlidesForm' => $slidesForm,
                            );
                        } else {
                            $adapter->setDestination(IMG_SLIDES);
                            if ($adapter->receive($File['name'])) {
                                // Guardamos la imagen en IMG_SLIDES
                            }
                            if($slidesPKQuery->getSlidesImg() != "/img/slides/".$File['name']){
                                foreach($slidesForm->getData() as $slidesKey => $slidesValue){
                                    if($slidesKey != 'submit'){
                                        if($slidesKey == 'slides_img'){// Almacenamos la ruta en donde se encuentra el archivo que remplasaremos.
                                            $dirFile = EDIT_IMG.$slidesPKQuery->getSlidesImg();
                                            if(unlink($dirFile)){//El archivo fue borrado.
                                                $slidesPKQuery->setSlidesImg('/img/slides/'.$slidesValue);
                                            }else{
                                                $slidesPKQuery->setSlidesImg('/img/slides/'.$slidesValue);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    foreach($slidesForm->getData() as $slidesKey => $slidesValue){
                        if($slidesKey != 'submit' && $slidesKey != 'slides_img'){
                            $slidesPKQuery->setByName($slidesKey, $slidesValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    // Si no modifican nada, permanecemos en el formulario.
                    if($slidesPKQuery->isModified()){
                        $slidesPKQuery->save();
                        return $this->redirect()->toRoute('panel-slides');
                    }
                }
            }

            return array(
                'id' => $id,
                'SlidesForm' => $slidesForm,
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
                return $this->redirect()->toRoute('panel-slides');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Si') {
                    $id = (int) $request->getPost('id');
                    $slidesQuery = SlidesQuery::create()->filterByIdslides($id)->findOne();
                    // Almacenamos la ruta en donde se encuentra el archivo que remplasaremos.
                    $dirFile = DELETE_IMG.$slidesQuery->getSlidesImg();
                    if(unlink($dirFile)){//El archivo fue borrado.
                        SlidesQuery::create()->filterByIdslides($id)->delete();
                    }else{
                        SlidesQuery::create()->filterByIdslides($id)->delete();
                    }
                }

                // Redireccionamos a los slides
                return $this->redirect()->toRoute('panel-slides');
            }

            $slidesEntity = SlidesQuery::create()->filterByIdslides($id)->findOne();
            return array(
                'id'    => $id,
                'slides' => $slidesEntity->toArray(BasePeer::TYPE_FIELDNAME)
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
