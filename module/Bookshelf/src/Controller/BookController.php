<?php
declare(strict_types = 1);
namespace Bookshelf\Controller;

use Bookshelf\Form\BookForm;
use Bookshelf\Model\Book;
use Bookshelf\Model\BookTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BookController extends AbstractActionController
{
    protected $bookTable;

    public function __construct(BookTable $bookTable)
    {
        $this->bookTable = $bookTable;
    }

    public function indexAction()
    {
        return new ViewModel([
            'books' => $this->bookTable->fetchAll(),
        ]);
    }

    public function addAction()
    {
        $form = new BookForm();
        $form->get('submit')->setAttribute('value', 'Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $book = new Book();
            $form->setInputFilter($book->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $book->exchangeArray($form->getData());
                $this->bookTable->saveBook($book);

                // Redirect to list of books
                return $this->redirect()->toRoute('book');
            }
        }

        return new ViewModel([
            'form' => $form
        ]);
    }

    public function editAction()
    {
        $id = (int)$this->params('id');
        if (!$id) {
            return $this->redirect()->toRoute('book', ['action' => 'add']);
        }
        $book = $this->bookTable->getBook($id);

        $form = new BookForm();
        $form->bind($book);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->bookTable->saveBook($book);

                // Redirect to list of books
                return $this->redirect()->toRoute('book');
            }
        }

        return new ViewModel([
            'id' => $id,
            'form' => $form,
        ]);
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
                $this->bookTable->deleteBook($id);
            }

            // Redirect to list of books
            return $this->redirect()->toRoute('book');
        }

        return new ViewModel([
            'id' => $id,
            'book' => $this->bookTable->getBook($id)
        ]);
    }
}
