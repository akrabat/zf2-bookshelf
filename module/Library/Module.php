<?php
namespace Library;

use Library\Model\BookTable;


class Module
{
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Library\Model\BookTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table = new BookTable($dbAdapter);
                    return $table;
                },
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
