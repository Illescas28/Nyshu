<?php

namespace Panel\Controller\ElementoTitulo;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Form ////
use Panel\Forms\ElementoTitulo\ElementoTituloForm;

//// Filter ////
use  Panel\Filters\ElementoTitulo\ElementoTituloFilter;

//// Propel ////
use Elementtitle;
use ElementtitleQuery;
use BasePeer;

class ElementoTituloController extends AbstractActionController
{
    public function nuevoAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');

            $elementotituloForm = new ElementoTituloForm();
            $elementotituloForm->get('submit')->setValue('Nuevo');

            $request = $this->getRequest();
            if ($request->isPost()) {

                $elementotituloFilter = new ElementoTituloFilter();
                $elementotituloForm->setInputFilter($elementotituloFilter->getInputFilter());
                $elementotituloForm->setData($request->getPost());

                if ($elementotituloForm->isValid()) {

                    $elementotituloQuery = ElementtitleQuery::create()->find();

                    if($elementotituloQuery->count() <= 2){
                        $elementotitulo = new Elementtitle();
                        foreach($elementotituloForm->getData() as $elementotituloKey => $elementotituloValue){
                            if($elementotituloKey != 'idelementtitle' && $elementotituloKey != 'submit'){
                                $elementotitulo->setByName($elementotituloKey, $elementotituloValue, BasePeer::TYPE_FIELDNAME);
                            }
                        }
                        $elementotitulo->setElementtitleType('text_top');
                        $elementotitulo->save();
                        return $this->redirect()->toRoute('panel-element-title');
                    }else{
                        //Agregamos un mensaje
                        $this->flashMessenger()->addMessage('No es posible guardar mas de 3 títulos!');
                        return $this->redirect()->toRoute('panel-element-title');
                    }
                }
            }
            return array('ElementoTituloForm' => $elementotituloForm);
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
            $elementotituloQuery = new ElementtitleQuery();

            // Obtenemos el filtrado por medio del idcompany del recurso.
            $result = $elementotituloQuery->paginate(1,50000);

            $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'elementtitles' => $data,
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
                return $this->redirect()->toRoute('panel-element-title', array(
                    'action' => 'nuevo'
                ));
            }

            //Instanciamos nuestra elementotituloQuery
            $elementotituloQuery = ElementtitleQuery::create();

            //Verificamos que el Id elementotitulo que se quiere modificar exista
            if($elementotituloQuery->create()->filterByIdelementtitle($id)->exists()){

                $icons = array(
                    'mdi-maps-local-bar' => 'mdi-maps-local-bar',
                    'mdi-maps-local-cafe' => 'mdi-maps-local-cafe',
                    'mdi-maps-local-pizza' => 'mdi-maps-local-pizza',
                    'mdi-maps-local-shipping' => 'mdi-maps-local-shipping',
                    'mdi-maps-restaurant-menu' => 'mdi-maps-restaurant-menu',
                    'mdi-maps-store-mall-directory' => 'mdi-maps-store-mall-directory',
                    'mdi-maps-place' => 'mdi-maps-place',
                    'mdi-social-cake' => 'mdi-social-cake',
                    'mdi-social-share' => 'mdi-social-share',
                    'mdi-action-accessibility' => 'mdi-action-accessibility',
                    'mdi-action-account-balance' => 'mdi-action-account-balance',
                    'mdi-action-account-child' => 'mdi-action-account-child',
                    'mdi-action-add-shopping-cart' => 'mdi-action-add-shopping-cart',
                    'mdi-action-alarm-on' => 'mdi-action-alarm-on',
                    'mdi-action-announcement' => 'mdi-action-announcement',
                    'mdi-action-face-unlock' => 'mdi-action-face-unlock',
                    'mdi-action-group-work' => 'mdi-action-group-work',
                    'mdi-action-home' => 'mdi-action-home',
                    'mdi-action-info-outline' => 'mdi-action-info-outline',
                    'mdi-action-perm-identity' => 'mdi-action-perm-identity',
                    'mdi-action-favorite-outline' => 'mdi-action-favorite-outline',
                    'mdi-action-view-list' => 'mdi-action-view-list',
                    'mdi-action-wallet-giftcard' => 'mdi-action-wallet-giftcard',
                    'mdi-editor-attach-money' => 'mdi-editor-attach-money',
                    'mdi-editor-insert-emoticon' => 'mdi-editor-insert-emoticon',
                    'mdi-image-tonality' => 'mdi-image-tonality',
                    'mdi-image-wb-sunny' => 'mdi-image-wb-sunny',
                    'mdi-maps-directions-car' => 'mdi-maps-directions-car',
                    'mdi-maps-local-atm' => 'mdi-maps-local-atm',
                );

                $request = $this->getRequest();
                //Instanciamos nuestra $elementotituloQuery
                $elementotituloPKQuery = $elementotituloQuery->findPk($id);
                $elementotituloQueryArray = $elementotituloPKQuery->toArray(BasePeer::TYPE_FIELDNAME);
                $elementotituloForm = new ElementoTituloForm($icons);
                $ElementoTextosElementoTextoForm = $elementotituloForm->getElements();

                if ($request->isPost()){

                    $elementotituloArray = array();
                    foreach($ElementoTextosElementoTextoForm as $key=>$value){
                        if($key != 'submit'){
                            $elementotituloArray[$key] = $request->getPost()->$key ? $request->getPost()->$key : $elementotituloQueryArray[$key];
                        }
                    }
                }else{
                    foreach($elementotituloQueryArray as $elementotituloQueryKey => $elementotituloQueryValue){
                        $elementotituloArray[$elementotituloQueryKey] = $elementotituloQueryArray[$elementotituloQueryKey];

                    }
                }

                $elementotituloFilter = new ElementoTituloFilter();
                $elementotituloForm->setInputFilter($elementotituloFilter->getInputFilter());
                $elementotituloForm->setData($elementotituloArray);

                if ($elementotituloForm->isValid()) {

                    foreach($elementotituloForm->getData() as $elementotituloKey => $elementotituloValue){
                        if($elementotituloKey != 'submit'){
                            $elementotituloPKQuery->setByName($elementotituloKey, $elementotituloValue, BasePeer::TYPE_FIELDNAME);
                        }
                    }
                    // Si no modifican nada, permanecemos en el formulario.
                    if($elementotituloPKQuery->isModified()){
                        $elementotituloPKQuery->save();
                        return $this->redirect()->toRoute('panel-element-title');
                    }
                }
            }

            return array(
                'id' => $id,
                'ElementoTituloForm' => $elementotituloForm,
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
                return $this->redirect()->toRoute('panel-element-title');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Si') {
                    $id = (int) $request->getPost('id');
                    ElementtitleQuery::create()->filterByIdelementtitle($id)->delete();
                }

                // Redireccionamos a los elementotitulo
                return $this->redirect()->toRoute('panel-element-title');
            }

            $elementotituloEntity = ElementtitleQuery::create()->filterByIdelementtitle($id)->findOne();
            return array(
                'id'    => $id,
                'elementtitle' => $elementotituloEntity->toArray(BasePeer::TYPE_FIELDNAME)
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
