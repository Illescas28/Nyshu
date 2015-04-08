<?php

namespace  Panel\Forms\Categoria;

use Zend\Form\Form;

class CategoriaForm extends Form
{
    public function __construct($name = null)
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