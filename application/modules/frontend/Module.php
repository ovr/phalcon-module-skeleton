<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 */

namespace Frontend;

class Module
{
    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'Frontend\Controller' => APPLICATION_PATH . '/modules/frontend/controllers/',
            'Frontend\Model' => APPLICATION_PATH . '/modules/frontend/models/',
        ));
        $loader->register();
    }

    public function registerServices($di)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('Frontend\Controller');

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
        $view->setViewsDir(APPLICATION_PATH . '/modules/frontend/views/');
        $view->setLayoutsDir('../../common/layouts/');

        $di->set('view', $view);
    }
}
