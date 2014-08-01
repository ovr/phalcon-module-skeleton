<?php

namespace Admin\Controller;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    /**
     * Dashboard
     */
    public function indexAction()
    {
        $this->view->setLayout('admin');
    }
}
