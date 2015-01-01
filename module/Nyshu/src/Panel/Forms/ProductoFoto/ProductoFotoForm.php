<?php

namespace  Panel\Forms\ProductoFoto;

use Zend\Form\Form;

class ProductoFotoForm extends Form
{
    public function __construct(array $productos = null)
    {
        // we want to ignore the name passed
        parent::__construct('ProductoFoto');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');


        $this->add(array(
            'name' => 'idproductphoto',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'idproduct',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Productos',
                'empty_option' => 'Seleccione un producto',
                'value_options' => $productos,
            ),
        ));
        $this->add(array(
            'name' => 'productphoto_img',
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