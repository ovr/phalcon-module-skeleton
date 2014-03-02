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
            'Frontend\Model'      => APPLICATION_PATH . '/modules/frontend/models/',
        ));
        $loader->register();
    }

    public function registerServices($di)
    {
        $di->set('dispatcher', function() {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace('Frontend\Controller');
            return $dispatcher;
        });

		/**
		 * @var \Phalcon\Mvc\View
		 */
		$view = $di->get('view');

		$di->set('view', function () use ($view) {
			$view->setLayout('index');
			$view->setViewsDir(APPLICATION_PATH . '/modules/frontend/views/');
            $view->setLayoutsDir('../../common/layouts/');
			return $view;
		});
    }
} 