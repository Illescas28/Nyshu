<?php

namespace Panel\Controller\ElementoTexto;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Form ////
use Panel\Forms\ElementoTexto\ElementoTextoForm;

//// Filter ////
use  Panel\Filters\ElementoTexto\ElementoTextoFilter;

//// Propel ////
use Elementtext;
use ElementtextQuery;
use BasePeer;

class ElementoTextoController extends AbstractActionController
{
    public function nuevoAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');
            $icons = array(
                'mdi-maps-local-bar' => 'Icono de bar',
                'mdi-maps-local-cafe' => 'Icono de cafe',
                'mdi-maps-local-pizza' => 'Icono de pizza',
                'mdi-maps-local-shipping' => 'Icono de compras',
                'mdi-maps-restaurant-menu' => 'Icono de menu',
                'mdi-maps-store-mall-directory' => 'Icono de Tienda',
                'mdi-maps-place' => 'Icono de lugar',
                'mdi-social-cake' => 'Icono de pastel',
                'mdi-social-share' => 'Icono de compartir',
                'mdi-action-accessibility' => 'Icono de accesibilidad',
                'mdi-action-account-balance' => 'Icono de balance',
                'mdi-action-account-child' => 'Icono de cuenta de usuario',
                'mdi-action-add-shopping-cart' => 'Icono de carrito de compras',
                'mdi-action-alarm-on' => 'Icono de alarma',
                'mdi-action-announcement' => 'Icono de anuncio',
                'mdi-action-face-unlock' => 'Icono de desbloqueo',
                'mdi-action-group-work' => 'Icono de grupo',
                'mdi-action-home' => 'Icono de hogar',
                'mdi-action-info-outline' => 'Icono de información',
                'mdi-action-perm-identity' => 'Icono de identidad',
                'mdi-action-favorite-outline' => 'Icono de información 2',
                'mdi-action-view-list' => 'Icono de listar',
                'mdi-action-wallet-giftcard' => 'Icono de tarjeta de regalo',
                'mdi-editor-attach-money' => 'Icono de dinero',
                'mdi-editor-insert-emoticon' => 'Icono de emoción',
                'mdi-image-tonality' => 'Icono de totañidad',
                'mdi-image-wb-sunny' => 'Icono de suny',
                'mdi-maps-directions-car' => 'Icono de dirección de carro',
                'mdi-maps-local-atm' => 'Icono de local',
            );

            $elementotextoForm = new ElementoTextoForm($icons);
            $elementotextoForm->get('submit')->setValue('Nuevo');

            $request = $this->getRequest();
            if ($request->isPost()) {

                $elementotextoFilter = new ElementoTextoFilter();
                $elementotextoForm->setInputFilter($elementotextoFilter->getInputFilter());
                $elementotextoForm->setData($request->getPost());

                if ($elementotextoForm->isValid()) {

                    $elementotextoQuery = ElementtextQuery::create()->find();

                    if($elementotextoQuery->count() <= 8){
                        $elementotexto = new Elementtext();
                        foreach($elementotextoForm->getData() as $elementotextoKey => $elementotextoValue){
                            if($elementotextoKey != 'idelementtext' && $elementotextoKey != 'submit' && $elementotextoKey != 'elementtext_type'){
                                $elementotexto->setByName($elementotextoKey, $elementotextoValue, BasePeer::TYPE_FIELDNAME);
                            }
                        }
                        $elementotexto->setElementtextType('text_botton');
                        $elementotexto->save();
                        return $this->redirect()->toRoute('panel-element-text');
                    }else{
                        //Agregamos un mensaje
                        $this->flashMessenger()->addMessage('No es posible guardar mas de 9 textos!');
                        return $this->redirect()->toRoute('panel-element-text');
                    }
                }
            }
            return array('ElementoTextoForm' => $elementotextoForm);
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
            $elementotextoQuery = new ElementtextQuery();

            // Obtenemos el filtrado por medio del idcompany del recurso.
            $result = $elementotextoQuery->paginate(1,50000);

            $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'elementtexts' => $data,
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
                return $this->redirect()->toRoute('panel-element-text', array(
                    'action' => 'nuevo'
                ));
            }

            //Instanciamos nuestra elementotextoQuery
            $elementotextoQuery = ElementtextQuery::create();

            //Verificamos que el Id elementotexto que se quiere modificar exista
            if($elementotextoQuery->create()->filterByIdelementtext($id)->exists()){

                $icons = array(
                    'mdi-maps-local-bar' => 'Icono de bar',
                    'mdi-maps-local-cafe' => 'Icono de cafe',
                    'mdi-maps-local-pizza' => 'Icono de pizza',
                    'mdi-maps-local-shipping' => 'Icono de compras',
                    'mdi-maps-restaurant-menu' => 'Icono de menu',
                    'mdi-maps-store-mall-directory' => 'Icono de Tienda',
                    'mdi-maps-place' => 'Icono de lugar',
                    'mdi-social-cake' => 'Icono de pastel',
                    'mdi-social-share' => 'Icono de compartir',
                    'mdi-action-accessibility' => 'Icono de accesibilidad',
                    'mdi-action-account-balance' => 'Icono de balance',
                    'mdi-action-account-child' => 'Icono de cuenta de usuario',
                    'mdi-action-add-shopping-cart' => 'Icono de carrito de compras',
                    'mdi-action-alarm-on' => 'Icono de alarma',
                    'mdi-action-announcement' => 'Icono de anuncio',
                    'mdi-action-face-unlock' => 'Icono de desbloqueo',
                    'mdi-action-group-work' => 'Icono de grupo',
                    'mdi-action-home' => 'Icono de hogar',
                    'mdi-action-info-outline' => 'Icono de información',
                    'mdi-action-perm-identity' => 'Icono de identidad',
                    'mdi-action-favorite-outline' => 'Icono de información 2',
                    'mdi-action-view-list' => 'Icono de listar',
                    'mdi-action-wallet-giftcard' => 'Icono de tarjeta de regalo',
                    'mdi-editor-attach-money' => 'Icono de dinero',
                    'mdi-editor-insert-emoticon' => 'Icono de emoción',
                    'mdi-image-tonality' => 'Icono de totañidad',
                    'mdi-image-wb-sunny' => 'Icono de suny',
                    'mdi-maps-directions-car' => 'Icono de dirección de carro',
                    'mdi-maps-local-atm' => 'Icono de local',
                );

                $request = $this->getRequest();
                //Instanciamos nuestra $elementotextoQuery
                $elementotextoPKQuery = $elementotextoQuery->findPk($id);
                $elementotextoQueryArray = $elementotextoPKQuery->toArray(BasePeer::TYPE_FIELDNAME);
                $elementotextoForm = new ElementoTextoForm($icons);
                $ElementoTextosElementoTextoForm = $elementotextoForm->getElements();

                if ($request->isPost()){

                    $elementotextoArray = array();
                    foreach($ElementoTextosElementoTextoForm as $key=>$value){
                        if($key != 'submit'){
                            $elementotextoArray[$key] = $request->getPost()->$key ? $request->getPost()->$key : $elementotextoQueryArray[$key];
                        }
                    }
                }else{
                    foreach($elementotextoQueryArray as $elementotextoQueryKey => $elementotextoQueryValue){
                        $elementotextoArray[$elementotextoQueryKey] = $elementotextoQueryArray[$elementotextoQueryKey];

                    }
                }

                $elementotextoFilter = new ElementoTextoFilter();
                $elementotextoForm->setInputFilter($elementotextoFilter->getInputFilter());
                $elementotextoForm->setData($elementotextoArray);

                if ($elementotextoForm->isValid()) {

                    foreach($elementotextoForm->getData() as $elementotextoKey => $elementotextoValue){
                        if($elementotextoKey != 'submit'){
                            $elementotextoPKQuery->setByName($elementotextoKey, $elementotextoValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    // Si no modifican nada, permanecemos en el formulario.
                    if($elementotextoPKQuery->isModified()){
                        $elementotextoPKQuery->save();
                        return $this->redirect()->toRoute('panel-element-text');
                    }
                }
            }

            return array(
                'id' => $id,
                'ElementoTextoForm' => $elementotextoForm,
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
                return $this->redirect()->toRoute('panel-element-text');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Si') {
                    $id = (int) $request->getPost('id');
                    ElementtextQuery::create()->filterByIdelementtext($id)->delete();
                }

                // Redireccionamos a los elementotexto
                return $this->redirect()->toRoute('panel-element-text');
            }

            $elementotextoEntity = ElementtextQuery::create()->filterByIdelementtext($id)->findOne();
            return array(
                'id'    => $id,
                'elementtext' => $elementotextoEntity->toArray(BasePeer::TYPE_FIELDNAME)
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
