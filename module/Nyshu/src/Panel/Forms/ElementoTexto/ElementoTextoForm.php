<?php

namespace  Panel\Forms\ElementoTexto;

use Zend\Form\Form;

class ElementoTextoForm extends Form
{
    public function __construct(array $icons = null, array $types = null)
    {
        // we want to ignore the name passed
        parent::__construct('ElementoTextoForm');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');

        $this->add(array(
            'name' => 'idelementtext',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'elementtext_description',
            'type' => 'Text',
            'options' => array(
                'label' => 'Descripción',
            ),
        ));
        $this->add(array(
            'name' => 'elementtext_icon',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Iconos',
                'empty_option' => 'Seleccione una clase de icono',
                'value_options' => $icons,
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