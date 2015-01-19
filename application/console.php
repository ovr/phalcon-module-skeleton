<?php
/**
 * @author Patsura Dmitry <talk@dmtry.me>
 */

include_once __DIR__ . '/../vendor/autoload.php';

define('APPLICATION_PATH', realpath(__DIR__));
define('APPLICATION_ENV', getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development');

use App\Console\Command\SettingsUpdate;
use App\Console\Application;

$config = include APPLICATION_PATH . "/config/core.php";
$application = new \Phalcony\Application(APPLICATION_ENV, $config, \Phalcon\DI\FactoryDefault\CLI::getDefault());
$application->bootstrap();

$consoleApplication = new Application($application);
$consoleApplication->add(new SettingsUpdate());
$consoleApplication->run();
