<?php

namespace  Panel\Forms\Producto;

use Zend\Form\Form;

class ProductoForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('ProductoForm');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'idproduct',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'idcategory',
            'type' => 'Text',
            'options' => array(
                'label' => 'ID Categoría',
            ),
        ));
        $this->add(array(
            'name' => 'product_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nombre',
            ),
        ));
        $this->add(array(
            'name' => 'product_description',
            'type' => 'Text',
            'options' => array(
                'label' => 'Descripción',
            ),
        ));
        $this->add(array(
            'name' => 'product_price',
            'type' => 'Text',
            'options' => array(
                'label' => 'Precio',
            ),
        ));
        $this->add(array(
            'name' => 'product_long',
            'type' => 'Text',
            'options' => array(
                'label' => 'Largo',
            ),
        ));
        $this->add(array(
            'name' => 'product_high',
            'type' => 'Text',
            'options' => array(
                'label' => 'Alto',
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