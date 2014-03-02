<?php
/**
 * @author Patsura Dmitry <zaets28rus@gmail.com>
 * @date: 02.03.14 16:44
 */

namespace App;

use Phalcon\Mvc\View;

class Application extends \Phalcony\Application
{
    protected function initView()
    {
        $view = new View();

        $view->setLayoutsDir($this->configuration['application']['layoutDir']);
        $view->registerEngines(array(
                '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
        ));

        return $view;
    }

    protected function initRouter()
    {
        $router = new \Phalcon\Mvc\Router();
        $router->setDefaultModule('frontend');
        $router->setDefaultController("index");
        $router->setDefaultAction("index");

        return $router;
    }
}
