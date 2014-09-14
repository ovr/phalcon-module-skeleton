<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 * @ate: 02.03.14 16:43
 */

define('APPLICATION_PATH', dirname(dirname(__FILE__)) . '/application');
define('PUBLIC_PATH', dirname(__FILE__));
define('APPLICATION_ENV', getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production');

require_once APPLICATION_PATH . "/../vendor/autoload.php";
$config = include APPLICATION_PATH . "/config/core.php";

$application = new \Phalcony\Application(APPLICATION_ENV, $config);
$application->bootstrap()->run();
