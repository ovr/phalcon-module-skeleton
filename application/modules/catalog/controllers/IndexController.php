<?php

namespace Catalog\Controller;

use Phalcon\Mvc\Controller;
use Catalog\Model\Category;
use Catalog\Model\Product;

/**
 * Class IndexController
 * @package Catalog\Controller
 */
class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->setLayout('catalog');

        $this->view->categories = Category::find();
        $this->view->products = Product::find();
    }

    public function categoryAction($categoryId)
    {
        var_dump($categoryId);
    }
}
