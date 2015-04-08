<?php
namespace Website\Forms;

use Zend\Form\Form;

class CategoryForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('CategoryForm');

        $this->add(array(
            'name' => 'idcategory',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'category_name',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Hidden',
        ));
    }
}