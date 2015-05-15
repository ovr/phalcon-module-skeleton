<?php

namespace Catalog\Controller;

use Phalcon\Mvc\Controller;
use Catalog\Model\Category;
use Catalog\Model\Product;

/**
 * Class ProductController
 * @package Catalog\Controller
 */
class ProductController extends Controller
{
    public function indexAction($productId)
    {
        $this->view->setLayout('index');

        $this->view->product = Product::findFirst();
    }
}
