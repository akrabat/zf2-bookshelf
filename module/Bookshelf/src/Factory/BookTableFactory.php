<?php
declare(strict_types = 1);
namespace Bookshelf\Factory;

use Bookshelf\Model\BookTable;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter as DbAdapter;
use Zend\ServiceManager\Factory\FactoryInterface;

class BookTableFactory implements FactoryInterface
{
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) {
        $dbAdapter = $container->get(DbAdapter::class);
        return new BookTable($dbAdapter);
    }
}
