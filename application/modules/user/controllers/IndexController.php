<?php

namespace User\Controller;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function viewAction()
    {
        $id = $this->dispatcher->getParam('id', 'int', 0);
    }
}
