<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Panel\Controller\Login;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

// Form //
use Panel\Forms\Login\UserForm;

// Filter //
use Panel\Filters\Login\UserFilter;

// Propel //
use BasePeer;
use UserQuery;

class LoginController extends AbstractActionController
{
    public function loginAction()
    {
        $userForm = new UserForm();
        $request = $this->getRequest();

        if($request->isPost()){
            $userFilter = new UserFilter();
            $userForm->setInputFilter($userFilter->getInputFilter());
            $userForm->setData($request->getPost());

            if ($userForm->isValid()) {
                $userArray = array();
                foreach($userForm->getData() as $userKey => $userValue){
                    $userArray[$userKey] = $userValue;
                }
                $userExists = UserQuery::create()->filterByUserName($userArray['user_name'])->filterByUserPassword($userArray['user_password'])->exists();

                if($userExists){
                    session_start();
                    $_SESSION['user_name'] = $userArray['user_name'];
                    $this->layout('layout/layoutPanel');
                    return $this->redirect()->toRoute('panel-producto', array('action' => 'listar'));

                }else{
                    $this->layout('layout/layoutAuth');
                }
            }else{
                $this->layout('layout/layoutAuth');
            }
        }else{
            $this->layout('layout/layoutAuth');
        }
        return array(
            'userForm' => $userForm,
        );
    }

    public function logoutAction()
    {
        session_start();
        session_destroy();
        $this->layout('layout/layoutPanel');
        return $this->redirect()->toRoute('panel-producto', array('action' => 'listar'));
    }
}
