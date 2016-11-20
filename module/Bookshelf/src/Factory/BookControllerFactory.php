<?php
declare(strict_types = 1);
namespace Bookshelf\Factory;

use Bookshelf\Controller\BookController;
use Bookshelf\Model\BookTable;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class BookControllerFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        $bookTable = $container->get(BookTable::class);
        return new BookController($bookTable);
    }
}
