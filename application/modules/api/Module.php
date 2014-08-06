<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace Api;

use Phalcony\Rest\Dispatcher;

class Module implements \Phalcon\Mvc\ModuleDefinitionInterface
{
    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'Api\Controller' => APPLICATION_PATH . '/modules/api/controllers/',
            'Api\Model' => APPLICATION_PATH . '/modules/api/models/',
        ));
        $loader->register();
    }

    public function registerServices($di)
    {
        $dispatcher = new Dispatcher();
        $dispatcher->setDI($di);
        $dispatcher->setDefaultNamespace('Api\Controller');

        $di->set('dispatcher', $dispatcher);
    }
}
