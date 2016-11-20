<?php
declare(strict_types = 1);
namespace Bookshelf\Form;

use Zend\Form\Form;

class BookForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('book');

        $this->setAttribute('method', 'post');
        $this->add([
            // 'type'  => 'hidden',
            'name' => 'id',
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'author',
            'attributes' => [
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Artist',
            ],
        ]);

        $this->add([
            'name' => 'title',
            'attributes' => [
                'class' => 'form-control',
                'class' => 'form-control',
            ],
            'options' => [
                'label' => 'Title',
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'attributes' => [
                'type'  => 'submit',
                'value' => 'Go',
                'class' => 'btn btn-default',
                'id' => 'submitbutton',
            ],
        ]);

    }
}
