<?php

date_default_timezone_set('US/Eastern');
iconv_set_encoding('internal_encoding', 'UTF-8');
setlocale(LC_ALL, 'ru_RU.UTF-8');

return array(
    'services' => array(
        'db' => array(
            'class' => '\Phalcon\Db\Adapter\Pdo\Mysql',
            '__construct' => array(
                'adapter'     => 'Mysql',
                'host'        => 'localhost',
                'username'    => 'root',
                'password'    => 'root',
                'dbname'      => 'phalcony-module',
                'options'	  => array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_PERSISTENT => true
                )
            ),
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

                $router = new \Phalcon\Mvc\Router();

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

                $router->setDefaultNamespace('Frontend\Controller');
                return $router;
            },
            'parameters' => array(
                'uriSource' => Phalcon\Mvc\Router::URI_SOURCE_SERVER_REQUEST_URI
            )
        ),
        'view' => array(
            'class' => function () {
                $class = new \Phalcon\Mvc\View();
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
        'cacheDir' => APPLICATION_PATH . '/cache/',
        'baseUri' => '/',
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
