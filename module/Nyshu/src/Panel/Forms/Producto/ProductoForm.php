<?php

namespace  Panel\Forms\Producto;

use Zend\Form\Form;

class ProductoForm extends Form
{
    public function __construct(array $categories = null)
    {
        // we want to ignore the name passed
        parent::__construct('ProductoForm');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');

        $this->add(array(
            'name' => 'idproduct',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'idcategory',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
                'label' => 'Categorías',
                'empty_option' => 'Seleccione una categoría',
                'value_options' => $categories,
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
            'name' => 'product_img',
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