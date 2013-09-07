<?php

namespace Library\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Library\Model\BookEntity;

class BookTable extends AbstractTableGateway
{
    protected $table = 'book';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new BookEntity());

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getBook($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveBook(BookEntity $book)
    {
        $data = array(
            'author' => $book->author,
            'title'  => $book->title,
        );

        $id = (int)$book->id;
        if ($id == 0) {
            $this->insert($data);
            $id = $this->getLastInsertValue();
            $book->id = $id;
        } else {
            if ($this->getBook($id)) {
                $this->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteBook($id)
    {
        $this->delete(array('id' => $id));
    }

}
