<?php
declare(strict_types = 1);
namespace Bookshelf\Model;

use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\ResultSet;
use Bookshelf\Model\Book;

class BookTable extends AbstractTableGateway
{
    protected $table = 'book';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype(new Book());

        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet;
    }

    public function getBook(int $id)
    {
        $rowset = $this->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveBook(Book $book)
    {
        $data = [
            'author' => $book->author,
            'title'  => $book->title,
        ];

        $id = (int)$book->id;
        if ($id == 0) {
            $this->insert($data);
        } else {
            if ($this->getBook($id)) {
                $this->update($data, ['id' => $id]);
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteBook(int $id)
    {
        $this->delete(['id' => $id]);
    }
}
