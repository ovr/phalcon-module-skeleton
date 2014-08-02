<?php

namespace Admin\Controller;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    private $identity;

    public function initialize()
    {
        $this->identity = $this->di->get('auth')->getIdentity();
        
        if (!$this->identity) {
            $this->response->redirect('/admin/auth/login', true);
        }
    }

    /**
     * Dashboard
     */
    public function indexAction()
    {
        $this->view->setLayout('admin');
    }
}
