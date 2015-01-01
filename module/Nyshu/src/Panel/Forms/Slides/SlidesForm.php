<?php

namespace  Panel\Forms\Slides;

use Zend\Form\Form;

class SlidesForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('SlidesForm');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');

        $this->add(array(
            'name' => 'idslides',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'slides_title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Título',
            ),
        ));
        $this->add(array(
            'name' => 'slides_description',
            'type' => 'Text',
            'options' => array(
                'label' => 'Descripción',
            ),
        ));
        $this->add(array(
            'name' => 'slides_img',
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