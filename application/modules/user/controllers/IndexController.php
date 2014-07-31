<?php

namespace User\Controller;

class IndexController extends \Phalcon\Mvc\Controller
{
    public function viewAction()
    {
        $id = $this->dispatcher->getParam('id', 'int', 0);
    }
}
