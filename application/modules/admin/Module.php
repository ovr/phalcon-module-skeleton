<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace Admin;

class Module
{
    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'Admin\Controller' => APPLICATION_PATH . '/modules/admin/controllers/',
            'Admin\Model' => APPLICATION_PATH . '/modules/admin/models/',
            'Admin\Form' => APPLICATION_PATH . '/modules/admin/forms/'
        ));
        $loader->register();
    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Admin\Controller');

        $eventsManager = $di->get('eventsManager');

        $eventsManager->attach("dispatch:beforeException", function ($event, $dispatcher, $exception) {
            /**
             * @todo and move it to global
             */
        });
        $dispatcher->setEventsManager($eventsManager);
        $di->set('dispatcher', $dispatcher);

        /**
         * @var \Phalcon\Mvc\View
         */
        $view = $di->get('view');
        $view->setLayout('index');
        $view->setViewsDir(APPLICATION_PATH . '/modules/admin/views/');
        $view->setLayoutsDir('../../common/layouts/');

        $di->set('view', $view);
    }
}
