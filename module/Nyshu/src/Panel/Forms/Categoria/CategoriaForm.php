<?php

namespace  Panel\Forms\Categoria;

use Zend\Form\Form;

class CategoriaForm extends Form
{
    public function __construct(array $icons = null)
    {
        // we want to ignore the name passed
        parent::__construct('CategoriaForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'idcategory',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'category_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nombre de Categoría',
            ),
        ));
        $this->add(array(
            'name' => 'category_icon',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Icono',
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