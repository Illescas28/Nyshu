<?php

namespace  Panel\Forms\Servicios;

use Zend\Form\Form;

class ServiciosForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('ServiciosForm');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');

        $this->add(array(
            'name' => 'idservice',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'service_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nombre',
            ),
        ));
        $this->add(array(
            'name' => 'service_description',
            'type' => 'Text',
            'options' => array(
                'label' => 'Descripción',
            ),
        ));
        $this->add(array(
            'name' => 'service_img',
            'attributes' => array(
                'type'  => 'file',
                'class' => 'pointer'
            ),
            'options' => array(
                'label' => 'Imagen',
            ),
        ));
        $this->add(array(
            'name' => 'service_background_img',
            'attributes' => array(
                'type'  => 'file',
                'class' => 'pointer'
            ),
            'options' => array(
                'label' => 'Imagen',
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
                'label' => 'Guardar',
            ),
        ));
    }
}