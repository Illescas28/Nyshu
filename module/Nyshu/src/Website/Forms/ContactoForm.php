<?php
namespace Website\Forms;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Form;

class ContactoForm extends Form
{
    public function __construct(CaptchaAdapter $captcha=null)
    {
        // we want to ignore the name passed
        parent::__construct('ContactoForm');
        $this->val_captcha = $captcha;

        $this->add(array(
            'name' => 'idcontact',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'contact_name',
            'type' => 'text',
            'options' => array(
                'label' => 'Nombre',
            ),
        ));
        $this->add(array(
            'type' => 'Email',
            'name' => 'contact_email',
            'options' => array(
                'label' => 'Email'
            ),
        ));
        $this->add(array(
            'name' => 'contact_phone',
            'type' => 'text',
            'options' => array(
                'label' => 'Teléfono',
            ),
        ));
        $this->add(array(
            'name' => 'contact_message',
            'attributes'=>array(
                'type'=>'text'
            ),
            'options' => array(
                'label' => 'Mensaje',
            ),
        ));
        $this->add(array(
            'type' => 'Zend\Form\Element\Captcha',
            'name' => 'validator',
            'options' => array(
                'captcha' => $this->val_captcha,
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
                'label' => 'Enviar',
            ),
        ));
    }
}