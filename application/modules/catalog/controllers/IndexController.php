<?php

namespace Catalog\Controller;

use Phalcon\Mvc\Controller;

/**
 * Class IndexController
 * @package Catalog\Controller
 */
class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->setLayout('catalog');
    }
}
