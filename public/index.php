<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 * @ate: 02.03.14 16:43
 */

define('APPLICATION_PATH', dirname(dirname(__FILE__)) . '/application');
define('PUBLIC_PATH', dirname(__FILE__));
define('APPLICATION_ENV', getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production');

require_once APPLICATION_PATH . "/../vendor/autoload.php";
require_once APPLICATION_PATH . "/../library/Application.php";
$config = include APPLICATION_PATH . "/config/".APPLICATION_ENV.".php";

$application = new \App\Application(APPLICATION_ENV, $config);
$application->bootstrap()->run();