<?php

namespace Panel\Controller\Contacto;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

//// Propel ////
use ContactQuery;
use BasePeer;

class ContactoController extends AbstractActionController
{
    public function listarAction()
    {
        session_start();
        if(\UserQuery::create()->filterByUserName($_SESSION['user_name'])->filterByUserPassword($_SESSION['user_password'])->exists()){
            $this->layout('layout/layoutPanel');

            $contactoQuery = new ContactQuery();

            $result = $contactoQuery->paginate(1,50000);

            $data = $result->getResults()->toArray(null,false,BasePeer::TYPE_FIELDNAME);

            return new ViewModel(array(
                'contactos' => $data,
            ));
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
                return $this->redirect()->toRoute('panel-contacto');
            }

            $request = $this->getRequest();
            if ($request->isPost()) {
                $del = $request->getPost('del', 'No');

                if ($del == 'Si') {
                    $id = (int) $request->getPost('id');
                    ContactQuery::create()->filterByIdcontact($id)->delete();
                }

                // Redireccionamos a los Contactos
                return $this->redirect()->toRoute('panel-contacto');
            }

            $contactoEntity = ContactQuery::create()->filterByIdcontact($id)->findOne();
            return array(
                'id'    => $id,
                'contacto' => $contactoEntity->toArray(BasePeer::TYPE_FIELDNAME)
            );
        }else{
            $this->layout('layout/layoutAuth');
            return $this->redirect()->toRoute('panel-login', array('action' => 'login'));
        }
    }
}
