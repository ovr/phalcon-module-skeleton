<?php

namespace Admin\Controller;

use Phalcon\Mvc\Controller;

class AuthController extends Controller
{
    public function initialize()
    {
        $this->view->setLayout('empty-layout');
    }

    public function loginAction()
    {

    }
}
