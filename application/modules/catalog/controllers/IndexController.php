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

        $this->view->categories = \Catalog\Model\Category::find();
        $this->view->products = \Catalog\Model\Product::find();
    }
}
