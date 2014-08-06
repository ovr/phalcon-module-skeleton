<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace Api;

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
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Api\Controller');
    }
}
