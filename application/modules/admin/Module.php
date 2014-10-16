<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace Admin;

use Phalcon\DiInterface;

class Module
{
    public function registerAutoloaders(DiInterface $dependencyInjector = null)
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'Admin\Controller' => APPLICATION_PATH . '/modules/admin/controllers/',
            'Admin\Model' => APPLICATION_PATH . '/modules/admin/models/',
            'Admin\Form' => APPLICATION_PATH . '/modules/admin/forms/'
        ));
        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Admin\Controller');

        /**
         * @var $view \Phalcon\Mvc\View
         */
        $view = $di->get('view');
        $view->setLayout('index');
        $view->setViewsDir(APPLICATION_PATH . '/modules/admin/views/');
        $view->setLayoutsDir('../../common/layouts/');
        $view->setPartialsDir('../../common/partials/');

        $di->set('view', $view);
    }
}
