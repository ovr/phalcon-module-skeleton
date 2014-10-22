<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace User;

use Phalcon\DiInterface;

class Module implements \Phalcon\Mvc\ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $dependencyInjector = null)
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'User\Controller' => APPLICATION_PATH . '/modules/user/controllers/',
            'User\Model' => APPLICATION_PATH . '/modules/user/models/',
        ));
        $loader->register();
    }

    public function registerServices(DiInterface $dependencyInjector)
    {
        $dispatcher = $dependencyInjector->get('dispatcher');
        $dispatcher->setDefaultNamespace('User\Controller');

        /**
         * @var $view \Phalcon\Mvc\View
         */
        $view = $dependencyInjector->get('view');
        $view->setLayout('index');
        $view->setViewsDir(APPLICATION_PATH . '/modules/user/views/');
        $view->setLayoutsDir('../../common/layouts/');
        $view->setPartialsDir('../../common/partials/');

        $dependencyInjector->set('view', $view);
    }
}
