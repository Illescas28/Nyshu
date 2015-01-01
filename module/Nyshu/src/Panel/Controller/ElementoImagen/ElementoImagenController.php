<?php

namespace Panel\Controller\ElementoImagen;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Form ////
use Panel\Forms\ElementoImagen\ElementoImagenForm;

//// Filter ////
use  Panel\Filters\ElementoImagen\ElementoImagenFilter;

//// Propel ////
use Elementimg;
use ElementimgQuery;
use BasePeer;

class ElementoImagenController extends AbstractActionController
{
    public function nuevoAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');
            $elementoimagenForm = new ElementoImagenForm();
            $elementoimagenForm->get('submit')->setValue('Nuevo');

            $request = $this->getRequest();
            if ($request->isPost()) {

                // Almacenamos en una variable de tipo array los datos que nos mandan por post (no almacena archivos)
                $nonFile = $request->getPost()->toArray();
                // Obtenemos los detalles del archivo
                $File = $this->params()->fromFiles('elementimg_img');

                // Creamos un array conjuntando los datos del post y el archivo
                $data = array_merge(
                    $nonFile, //POST
                    array('elementimg_img'=> $File['name']) //FILE...
                );

                $elementoimagenFilter = new ElementoImagenFilter();
                $elementoimagenForm->setInputFilter($elementoimagenFilter->getInputFilter());
                $elementoimagenForm->setData($data);

                if ($elementoimagenForm->isValid()) {

                    $elementoimagenQuery = ElementimgQuery::create()->find();

                    if($elementoimagenQuery->count() <= 2){
                        $size = new \Zend\Validator\File\Size(array('max'=>2000000)); //maximo bytes filesize
                        $adapter = new \Zend\File\Transfer\Adapter\Http();
                        $adapter->setValidators(array($size), $File['name']);

                        if (!$adapter->isValid()){
                            $dataError = $adapter->getMessages();
                            $error = array();
                            foreach($dataError as $key=>$row)
                            {
                                $error[] = $row;
                            } //seteamos formElementoImagenErrors
                            $elementoimagenForm->setMessages(array('elementimg_img'=>$error ));
                            return array('ElementoImagenForm' => $elementoimagenForm);
                        } else {
                            $adapter->setDestination(IMG_ELEMENTIMG);
                            if ($adapter->receive($File['name'])) {
                                // Guardamos la imagen en IMG_ELEMENTIMG
                            }
                        }

                        $elementoimagen = new Elementimg();
                        foreach($elementoimagenForm->getData() as $elementoimagenKey => $elementoimagenValue){
                            if($elementoimagenKey != 'idelementimg' && $elementoimagenKey != 'submit' && $elementoimagenKey != 'elementimg_type'){
                                if($elementoimagenKey == 'elementimg_img'){
                                    $elementoimagen->setElementimgImg('/img/elementimg/'.$elementoimagenValue);
                                }else{
                                    $elementoimagen->setByName($elementoimagenKey, $elementoimagenValue, BasePeer::TYPE_FIELDNAME);
                                }
                            }
                        }
                        $elementoimagen->setElementimgType('img_top');
                        $elementoimagen->save();
                        return $this->redirect()->toRoute('panel-element-img');
                    }else{
                        //Agregamos un mensaje
                        $this->flashMessenger()->addMessage('No es posible guardar mas de 3 imágenes!');
                        return $this->redirect()->toRoute('panel-element-img');
                    }
                }
            }
            return array('ElementoImagenForm' => $elementoimagenForm);
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
            $elementoimagenQuery = new ElementimgQuery();

            // Obtenemos el filtrado por medio del idcompany del recurso.
            $result = $elementoimagenQuery->paginate(1,50000);

            $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'elementimgs' => $data,
                'flashMessages' => $this->flashMessenger()->getMessages(),
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
                return $this->redirect()->toRoute('panel-element-img', array(
                    'action' => 'nuevo'
                ));
            }

            //Instanciamos nuestra elementoimagenQuery
            $elementoimagenQuery = ElementimgQuery::create();

            //Verificamos que el Id elementoimagen que se quiere modificar exista
            if($elementoimagenQuery->create()->filterByIdelementimg($id)->exists()){

                $request = $this->getRequest();
                //Instanciamos nuestra $elementoimagenQuery
                $elementoimagenPKQuery = $elementoimagenQuery->findPk($id);
                $elementoimagenQueryArray = $elementoimagenPKQuery->toArray(BasePeer::TYPE_FIELDNAME);
                $types = array(
                    'img_top' => 'img_top',
                    'img_botton' => 'img_botton'
                );
                $elementoimagenForm = new ElementoImagenForm($types);
                $ElementoImagensElementoImagenForm = $elementoimagenForm->getElements();

                if ($request->isPost()){
                    // Almacenamos en una variable de tipo array los datos que nos mandan por post (no almacena archivos)
                    $nonFile = $request->getPost()->toArray();
                    // Obtenemos los detalles del archivo
                    $File = $this->params()->fromFiles('elementimg_img');

                    // Creamos un array conjuntando los datos del post y el archivo
                    $data = array_merge(
                        $nonFile, //POST
                        array('elementimg_img'=> $File['name']) //FILE...
                    );

                    $elementoimagenArray = array();
                    foreach($ElementoImagensElementoImagenForm as $key=>$value){
                        if($key != 'submit'){
                            $elementoimagenArray[$key] = $data[$key] ? $data[$key] : $elementoimagenQueryArray[$key];
                        }
                    }
                }else{
                    foreach($elementoimagenQueryArray as $elementoimagenQueryKey => $elementoimagenQueryValue){
                        $elementoimagenArray[$elementoimagenQueryKey] = $elementoimagenQueryArray[$elementoimagenQueryKey];

                    }
                }

                $elementoimagenFilter = new ElementoImagenFilter();
                $elementoimagenForm->setInputFilter($elementoimagenFilter->getInputFilter());
                $elementoimagenForm->setData($elementoimagenArray);
                $elementoimagenForm->getInputFilter()->get('elementimg_img')->setRequired('false');

                if ($elementoimagenForm->isValid()) {

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
                            } //seteamos formElementoImagenErrors
                            $elementoimagenForm->setMessages(array('elementimg_img'=>$error ));
                            return array(
                                'id' => $id,
                                'ElementoImagenForm' => $elementoimagenForm,
                            );
                        } else {
                            $adapter->setDestination(IMG_ELEMENTIMG);
                            if ($adapter->receive($File['name'])) {
                                // Guardamos la imagen en IMG_ELEMENTIMG
                            }
                            if($elementoimagenPKQuery->getElementimgImg() != "/img/elementimg/".$File['name']){
                                foreach($elementoimagenForm->getData() as $elementoimagenKey => $elementoimagenValue){
                                    if($elementoimagenKey != 'submit'){
                                        if($elementoimagenKey == 'elementimg_img'){// Almacenamos la ruta en donde se encuentra el archivo que remplasaremos.
                                            $dirFile = EDIT_IMG.$elementoimagenPKQuery->getElementimgImg();
                                            if(unlink($dirFile)){//El archivo fue borrado.
                                                $elementoimagenPKQuery->setElementimgImg('/img/elementimg/'.$elementoimagenValue);
                                            }else{
                                                $elementoimagenPKQuery->setElementimgImg('/img/elementimg/'.$elementoimagenValue);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    foreach($elementoimagenForm->getData() as $elementoimagenKey => $elementoimagenValue){
                        if($elementoimagenKey != 'submit' && $elementoimagenKey != 'elementimg_img'){
                            $elementoimagenPKQuery->setByName($elementoimagenKey, $elementoimagenValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    // Si no modifican nada, permanecemos en el formulario.
                    if($elementoimagenPKQuery->isModified()){
                        $elementoimagenPKQuery->save();
                        return $this->redirect()->toRoute('panel-element-img');
                    }
                }
            }

            return array(
                'id' => $id,
                'ElementoImagenForm' => $elementoimagenForm,
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
                return $this->redirect()->toRoute('panel-element-img');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Si') {

                    $elementoimagenQuery = ElementimgQuery::create()->filterByIdelementimg($id)->findOne();
                    // Almacenamos la ruta en donde se encuentra el archivo que remplasaremos.
                    $dirFile = DELETE_IMG.$elementoimagenQuery->getElementimgImg();
                    if(unlink($dirFile)){//El archivo fue borrado.
                        ElementimgQuery::create()->filterByIdelementimg($id)->delete();
                    }else{
                        ElementimgQuery::create()->filterByIdelementimg($id)->delete();
                    }
                }

                // Redireccionamos a los elementoimagen
                return $this->redirect()->toRoute('panel-element-img');
            }

            $elementoimagenEntity = ElementimgQuery::create()->filterByIdelementimg($id)->findOne();
            return array(
                'id'    => $id,
                'elementimg' => $elementoimagenEntity->toArray(BasePeer::TYPE_FIELDNAME)
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
