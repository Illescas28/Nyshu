<?php

namespace  Panel\Forms\ElementoImagen;

use Zend\Form\Form;

class ElementoImagenForm extends Form
{
    public function __construct()
    {
        // we want to ignore the name passed
        parent::__construct('ElementoImagenForm');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');

        $this->add(array(
            'name' => 'idelementimg',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'elementimg_img',
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