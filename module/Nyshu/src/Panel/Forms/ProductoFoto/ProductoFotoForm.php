<?php

namespace  Panel\Forms\ProductoFoto;

use Zend\Form\Form;

class ProductoFotoForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('ProductoFoto');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'idproductphoto',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'idproduct',
            'type' => 'Text',
            'options' => array(
                'label' => 'ID Producto',
            ),
        ));
        $this->add(array(
            'name' => 'productphoto_img',
            'attributes' => array(
                'type'  => 'file',
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