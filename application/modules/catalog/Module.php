<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace Catalog;

use Phalcon\DiInterface;

class Module implements \Phalcon\Mvc\ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $dependencyInjector = null)
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'Catalog\Controller' => APPLICATION_PATH . '/modules/catalog/controllers/',
            'Catalog\Model' => APPLICATION_PATH . '/modules/catalog/models/',
        ));
        $loader->register();
    }

    public function registerServices(DiInterface $dependencyInjector)
    {
        $dispatcher = $dependencyInjector->get('dispatcher');
        $dispatcher->setDefaultNamespace('Catalog\Controller');

        /**
         * @var $view \Phalcon\Mvc\View
         */
        $view = $dependencyInjector->get('view');
        $view->setLayout('index');
        $view->setViewsDir(APPLICATION_PATH . '/modules/catalog/views/');
        $view->setLayoutsDir('../../common/layouts/');
        $view->setPartialsDir('../../common/partials/');

        $dependencyInjector->set('view', $view);
    }
}
