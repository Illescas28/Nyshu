<?php
namespace Panel\Forms\Login;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Form;

class UserForm extends Form
{
    public function __construct($name=null)
    {
        parent::__construct('UserForm');

        $this->add(array(
            'name' => 'iduser',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'user_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Usuario',
            ),
        ));
        $this->add(array(
            'name' => 'user_password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Contraseña',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => array(
                'id' => 'submitbutton',
                'class' => 'btn waves-effect waves-light',
            ),
            'options' => array(
                'label' => 'Entrar',
            ),
        ));
    }
}