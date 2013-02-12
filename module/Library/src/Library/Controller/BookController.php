<?php

namespace Library\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Library\Model\BookEntity;
use Library\Form\BookForm;

class BookController extends AbstractActionController
{
    protected $bookTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'books' => $this->getBookTable()->fetchAll(),
        ));
    }

    public function addAction()
    {
        $form = new BookForm();
        $form->get('submit')->setAttribute('value', 'Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $book = new BookEntity();
            $form->setInputFilter($book->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $book->exchangeArray($form->getData());
                $this->getBookTable()->saveBook($book);

                // Redirect to list of books
                return $this->redirect()->toRoute('book');
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('book', array('action'=>'add'));
        }
        $book = $this->getBookTable()->getBook($id);

        $form = new BookForm();
        $form->bind($book);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getBookTable()->saveBook($book);

                // Redirect to list of books
                return $this->redirect()->toRoute('book');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('book');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int)$request->getPost()->get('id');
                $this->getBookTable()->deleteBook($id);
            }

            // Redirect to list of books
            return $this->redirect()->toRoute('book');
        }

        return array(
            'id' => $id,
            'book' => $this->getBookTable()->getBook($id)
        );
    }

    public function getBookTable()
    {
        if (!$this->bookTable) {
            $sm = $this->getServiceLocator();
            $this->bookTable = $sm->get('Library\Model\BookTable');
        }
        return $this->bookTable;
    }    
}
