<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace Api;

use Phalcon\DiInterface;
use Phalcony\Rest\Dispatcher;

class Module implements \Phalcon\Mvc\ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $dependencyInjector = null)
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'Api\Controller' => APPLICATION_PATH . '/modules/api/controllers/',
            'Api\Model' => APPLICATION_PATH . '/modules/api/models/',
        ));
        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $dispatcher = new Dispatcher();
        $dispatcher->setDI($di);
        $dispatcher->setDefaultNamespace('Api\Controller');
        $dispatcher->setExceptionPath(array(
            'namespace' => 'Api\Controller',
            'module' => 'api',
            'controller' => 'index',
            'action'     => 'exception'
        ));
        
        $di->set('dispatcher', $dispatcher);
    }
}
