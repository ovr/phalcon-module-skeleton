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
        'modelsMetadata' => array(
            'class' => function() {
                $metaData = new \Phalcon\Mvc\Model\MetaData\Memory();
                $metaData->setStrategy(new \Engine\Db\Model\Annotations\Metadata());

                return $metaData;
            }
        ),
        'modelsManager' => array(
            'class' => function($di) {
                $eventsManager = $di->get('eventsManager');

                $modelsManager = new \Phalcon\Mvc\Model\Manager();
                $modelsManager->setEventsManager($eventsManager);

                $eventsManager->attach('modelsManager', new \Engine\Db\Model\Annotations\Initializer());

                return $modelsManager;
            }
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

                $router->add('/user/{id:([0-9]{1,32})}/:params', array(
                    'module' => 'user',
                    'controller' => 'index',
                    'action' => 'view',
                ))->setName('user-index-view');

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
            'user' => array(
                'className' => 'User\Module',
                'path' => APPLICATION_PATH . '/modules/user/Module.php',
            ),
        )
    )
);
