<?php

namespace  Panel\Forms\ElementoTitulo;

use Zend\Form\Form;

class ElementoTituloForm extends Form
{
    public function __construct(array $icons = null, array $types = null)
    {
        // we want to ignore the name passed
        parent::__construct('ElementoTituloForm');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');

        $this->add(array(
            'name' => 'idelementtitle',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'elementtitle_title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Título',
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