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
                'baseUri' => '/',
                'staticBaseUri' => '/static/' //Change to CDN if needed
            )
        ),
        'tag' => array(
            'class' => '\App\Tag'
        ),
        'modelsMetadata' => array(
            'class' => function () {
                $metaData = new \Phalcon\Mvc\Model\MetaData\Memory();
                $metaData->setStrategy(new \Engine\Db\Model\Annotations\Metadata());

                return $metaData;
            }
        ),
        'dispatcher' => array(
            'class' => function ($application) {
                $evManager = $application->getDI()->getShared('eventsManager');

                $evManager->attach('dispatch:beforeException', function ($event, $dispatcher, $exception) use (&$di) {
                    if (!class_exists('Frontend\Module')) {
                        include_once APPLICATION_PATH . '/modules/frontend/Module.php';
                        $module = new Frontend\Module();
                        $module->registerServices($di);
                        $module->registerAutoloaders($di);
                    }

                    /**
                     * @var $dispatcher \Phalcon\Mvc\Dispatcher
                     */
                    $dispatcher->setModuleName('frontend');

                    $dispatcher->forward(
                        array(
                            'namespace' => 'Frontend\Controller',
                            'module' => 'frontend',
                            'controller' => 'error',
                            'action'     => 'index',
                            'error' => $exception
                        )
                    );
                    return false;
                });

                $dispatcher = new \Phalcon\Mvc\Dispatcher();
                $dispatcher->setEventsManager($evManager);
                return $dispatcher;
            }
        ),
        'modelsManager' => array(
            'class' => function ($application) {
                $eventsManager = $application->getDI()->getShared('eventsManager');

                $modelsManager = new \Phalcon\Mvc\Model\Manager();
                $modelsManager->setEventsManager($eventsManager);

                $eventsManager->attach('modelsManager', new \Engine\Db\Model\Annotations\Initializer());

                return $modelsManager;
            }
        ),
        'router' => array(
            'class' => function ($application) {
                $router = new Router(false);

                foreach ($application->getModules() as $key => $module) {
                    $router->add('/'.$key.'/:params', array(
                        'module' => 'admin',
                        'controller' => 'index',
                        'action' => 'index',
                        'params' => 1
                    ))->setName($key);

                    $router->add('/'.$key.'/:controller/:params', array(
                        'module' => $key,
                        'controller' => 1,
                        'action' => 'index',
                        'params' => 2
                    ));

                    $router->add('/'.$key.'/:controller/:action/:params', array(
                        'module' => $key,
                        'controller' => 1,
                        'action' => 2,
                        'params' => 3
                    ))->setName('default');
                }

                $router->add('/user/{id:([0-9]{1,32})}/:params', array(
                    'module' => 'user',
                    'controller' => 'index',
                    'action' => 'view',
                ))->setName('user-index-view');

                $router->notFound(array(
                    'module' => 'frontend',
                    'namespace' => 'Frontend\Controller',
                    'controller' => 'error',
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
        ),
        'auth' => array(
            'class' => '\App\Service\Auth'
        )
    ),
    'application' => array(
        'modules' => array(
            'frontend' => array(
                'className' => 'Frontend\Module',
                'path' => APPLICATION_PATH . '/modules/frontend/Module.php',
            ),
            'catalog' => array(
                'className' => 'Catalog\Module',
                'path' => APPLICATION_PATH . '/modules/catalog/Module.php',
            ),
            'admin' => array(
                'className' => 'Admin\Module',
                'path' => APPLICATION_PATH . '/modules/admin/Module.php',
            ),
            'api' => array(
                'className' => 'Api\Module',
                'path' => APPLICATION_PATH . '/modules/api/Module.php',
            ),
            'user' => array(
                'className' => 'User\Module',
                'path' => APPLICATION_PATH . '/modules/user/Module.php',
            ),
        )
    )
);
