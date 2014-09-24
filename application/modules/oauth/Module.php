<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace OAuth;

class Module implements \Phalcon\Mvc\ModuleDefinitionInterface
{
    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'OAuth\Controller' => APPLICATION_PATH . '/modules/oauth/controllers/',
            'OAuth\Model' => APPLICATION_PATH . '/modules/oauth/models/',
        ));
        $loader->register();
    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('OAuth\Controller');

        /**
         * @var $view \Phalcon\Mvc\View
         */
        $view = $di->get('view');
        $view->setLayout('index');
        $view->setViewsDir(APPLICATION_PATH . '/modules/oauth/views/');
        $view->setLayoutsDir('../../common/layouts/');
        $view->setPartialsDir('../../common/partials/');

        $di->set('view', $view);
    }
}
