<?php

return array(
	'application' => array(
		'modelsDir'      => __DIR__ . '/../../app/models/',
		'layoutDir'       => APPLICATION_PATH . '/layouts/',
		'pluginsDir'     => __DIR__ . '/../../app/plugins/',
		'cacheDir'       => APPLICATION_PATH . '/cache/',
		'baseUri'        => '/',
	),
    'modules' => array(
        'frontend' => array(
            'className' => 'Frontend\Module',
            'path'      => APPLICATION_PATH . '/modules/frontend/Module.php',
        ),
        'admin' => array(
            'className' => 'Admin\Module',
            'path'      => APPLICATION_PATH . '/modules/admin/Module.php',
        ),
    ),
	'registerDirs' => array(
		APPLICATION_PATH . '/../vendor/',
		APPLICATION_PATH . '/../library/',
		APPLICATION_PATH . '/../vendor/ZF2/library/',
	),
	'error' => [
		'logger' => new \Phalcon\Logger\Adapter\File(APPLICATION_PATH . '/logs/' . APPLICATION_ENV . '.log'),
		'controller' => 'error',
		'action' => 'index',
		'module' => 'feed'
	]
);