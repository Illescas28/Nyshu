<?php

namespace Panel\Controller\Servicios;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Form ////
use Panel\Forms\Servicios\ServiciosForm;

//// Filter ////
use  Panel\Filters\Servicios\ServiciosFilter;

//// Propel ////
use Service;
use ServiceQuery;
use BasePeer;

class ServiciosController extends AbstractActionController
{
    public function nuevoAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');
            $serviciosForm = new ServiciosForm();
            $serviciosForm->get('submit')->setValue('Nuevo');

            $request = $this->getRequest();
            if ($request->isPost()) {

                // Almacenamos en una variable de tipo array los datos que nos mandan por post (no almacena archivos)
                $nonFile = $request->getPost()->toArray();
                // Obtenemos los detalles del archivo
                $File = $this->params()->fromFiles('service_img');

                // Creamos un array conjuntando los datos del post y el archivo
                $data = array_merge(
                    $nonFile, //POST
                    array('service_img'=> $File['name']) //FILE...
                );

                $serviciosFilter = new ServiciosFilter();
                $serviciosForm->setInputFilter($serviciosFilter->getInputFilter());
                $serviciosForm->setData($data);

                if ($serviciosForm->isValid()) {

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
                        $serviciosForm->setMessages(array('service_img'=>$error ));
                        return array('ServiciosForm' => $serviciosForm);
                    } else {
                        $adapter->setDestination(IMG_SERVICIOS);
                        if ($adapter->receive($File['name'])) {
                            // Guardamos la imagen en IMG_SERVICIOS
                        }
                    }

                    $servicios = new Service();
                    foreach($serviciosForm->getData() as $serviciosKey => $serviciosValue){
                        if($serviciosKey != 'idservice' && $serviciosKey != 'submit'){
                            if($serviciosKey == 'service_img'){
                                $servicios->setServiceImg('/img/services/'.$serviciosValue);
                            }else{
                                $servicios->setByName($serviciosKey, $serviciosValue, BasePeer::TYPE_FIELDNAME);
                            }
                        }
                    }
                    $servicios->save();
                    return $this->redirect()->toRoute('panel-servicios');
                }
            }
            return array('ServiciosForm' => $serviciosForm);
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
            $serviciosQuery = new serviceQuery();

            // Obtenemos el filtrado por medio del idcompany del recurso.
            $result = $serviciosQuery->paginate(1,50000);

            $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'servicios' => $data,
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
                return $this->redirect()->toRoute('panel-servicios', array(
                    'action' => 'nuevo'
                ));
            }

            //Instanciamos nuestra serviceQuery
            $serviciosQuery = ServiceQuery::create();

            //Verificamos que el Id servicios que se quiere modificar exista
            if($serviciosQuery->create()->filterByIdservice($id)->exists()){

                $request = $this->getRequest();
                //Instanciamos nuestra $serviciosQuery
                $serviciosPKQuery = $serviciosQuery->findPk($id);
                $serviciosQueryArray = $serviciosPKQuery->toArray(BasePeer::TYPE_FIELDNAME);
                $serviciosForm = new ServiciosForm();
                $ElementsServiciosForm = $serviciosForm->getElements();

                if ($request->isPost()){
                    // Almacenamos en una variable de tipo array los datos que nos mandan por post (no almacena archivos)
                    $nonFile = $request->getPost()->toArray();
                    // Obtenemos los detalles del archivo
                    $File = $this->params()->fromFiles('service_img');

                    // Creamos un array conjuntando los datos del post y el archivo
                    $data = array_merge(
                        $nonFile, //POST
                        array('service_img'=> $File['name']) //FILE...
                    );

                    $serviciosArray = array();
                    foreach($ElementsServiciosForm as $key=>$value){
                        if($key != 'submit'){
                            $serviciosArray[$key] = $data[$key] ? $data[$key] : $serviciosQueryArray[$key];
                        }
                    }
                }else{
                    foreach($serviciosQueryArray as $serviciosQueryKey => $serviciosQueryValue){
                        $serviciosArray[$serviciosQueryKey] = $serviciosQueryArray[$serviciosQueryKey];

                    }
                }

                $serviciosFilter = new ServiciosFilter();
                $serviciosForm->setInputFilter($serviciosFilter->getInputFilter());
                $serviciosForm->setData($serviciosArray);
                $serviciosForm->getInputFilter()->get('service_img')->setRequired('false');

                if ($serviciosForm->isValid()) {

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
                            $serviciosForm->setMessages(array('service_img'=>$error ));
                            return array(
                                'id' => $id,
                                'ServiciosForm' => $serviciosForm,
                            );
                        } else {
                            $adapter->setDestination(IMG_SERVICIOS);
                            if ($adapter->receive($File['name'])) {
                                // Guardamos la imagen en IMG_SERVICIOS
                            }
                            if($serviciosPKQuery->getServiceImg() != "/img/services/".$File['name']){
                                foreach($serviciosForm->getData() as $serviciosKey => $serviciosValue){
                                    if($serviciosKey != 'submit'){
                                        if($serviciosKey == 'service_img'){// Almacenamos la ruta en donde se encuentra el archivo que remplasaremos.
                                            $dirFile = EDIT_IMG.$serviciosPKQuery->getServiceImg();
                                            if(unlink($dirFile)){//El archivo fue borrado.
                                                $serviciosPKQuery->setServiceImg('/img/services/'.$serviciosValue);
                                            }else{
                                                $serviciosPKQuery->setServiceImg('/img/services/'.$serviciosValue);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    foreach($serviciosForm->getData() as $serviciosKey => $serviciosValue){
                        if($serviciosKey != 'submit' && $serviciosKey != 'service_img'){
                            $serviciosPKQuery->setByName($serviciosKey, $serviciosValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    // Si no modifican nada, permanecemos en el formulario.
                    if($serviciosPKQuery->isModified()){
                        $serviciosPKQuery->save();
                        return $this->redirect()->toRoute('panel-servicios');
                    }
                }
            }

            return array(
                'id' => $id,
                'ServiciosForm' => $serviciosForm,
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
                return $this->redirect()->toRoute('panel-servicios');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Si') {
                    $id = (int) $request->getPost('id');
                    $serviciosQuery = ServiceQuery::create()->filterByIdservice($id)->findOne();
                    // Almacenamos la ruta en donde se encuentra el archivo que remplasaremos.
                    $dirFile = DELETE_IMG.$serviciosQuery->getServiceImg();
                    if(unlink($dirFile)){//El archivo fue borrado.
                        ServiceQuery::create()->filterByIdservice($id)->delete();
                    }else{
                        ServiceQuery::create()->filterByIdservice($id)->delete();
                    }
                }

                // Redireccionamos a los servicios
                return $this->redirect()->toRoute('panel-servicios');
            }

            $serviciosEntity = ServiceQuery::create()->filterByIdservice($id)->findOne();
            return array(
                'id'    => $id,
                'servicio' => $serviciosEntity->toArray(BasePeer::TYPE_FIELDNAME)
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
