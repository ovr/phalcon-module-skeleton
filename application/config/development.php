<?php

return array(
    'application' => array(
        'layoutDir' => APPLICATION_PATH . '/layouts/',
        'cacheDir' => APPLICATION_PATH . '/cache/',
        'baseUri' => '/',
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
    ),
    'registerDirs' => array(
        APPLICATION_PATH . '/../library/',
    ),
    'error' => array(
        'logger' => new \Phalcon\Logger\Adapter\File(APPLICATION_PATH . '/logs/' . APPLICATION_ENV . '.log'),
        'controller' => 'error',
        'action' => 'index',
        'module' => 'feed'
    )
);
