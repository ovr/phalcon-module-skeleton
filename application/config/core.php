<?php

use Phalcon\Mvc\Router;
use Phalcon\Mvc\View;

return array(
    'services' => array(
        'db' => array(
            'class' => '\Phalcon\Db\Adapter\Pdo\Mysql',
            '__construct' => $parameters['db'],
        ),
        'logger' => array(
            'class' => '\Phalcon\Logger\Adapter\File',
            '__construct' => APPLICATION_PATH . '/logs/' . APPLICATION_ENV . '.log'
        ),
        'url' => array(
            'class' => '\Phalcon\Mvc\Url',
            'parameters' => array(
                'baseUri' => '/'
            )
        ),
        'router' => array(
            'class' => function () {
                $router = new Router();

                $router->add('/:module/:controller/:action/:params', array(
                    'module' => 1,
                    'controller' => 2,
                    'action' => 3,
                    'params' => 4
                ));

                $router->notFound(array(
                    'module' => 'frontend',
                    'namespace' => 'Frontend\Controller',
                    'controller' => 'index',
                    'action' => 'index'
                ));

                return $router;
            },
            'parameters' => array(
                'uriSource' => Router::URI_SOURCE_SERVER_REQUEST_URI
            )
        ),
        'view' => array(
            'class' => function () {
                $class = new View();
                $class->registerEngines(array(
                    '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
                ));

                return $class;
            },
            'parameters' => array(
                'layoutsDir' => APPLICATION_PATH . '/layouts/'
            )
        )
    ),
    'application' => array(
        'registerDirs' => array(
            APPLICATION_PATH . '/../library/',
        ),
        'registerNamespaces' => array(
            'Service' => APPLICATION_PATH . '/services/'
        ),
        'modules' => array(
            'frontend' => array(
                'className' => 'Frontend\Module',
                'path' => APPLICATION_PATH . '/modules/frontend/Module.php',
            ),
            'admin' => array(
                'className' => 'Admin\Module',
                'path' => APPLICATION_PATH . '/modules/admin/Module.php',
            ),
        )
    )
);
