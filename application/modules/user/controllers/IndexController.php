<?php

namespace User\Controller;

use Phalcon\Mvc\Controller;
use User\Model\User;

class IndexController extends Controller
{
    public function viewAction()
    {
        $id = $this->dispatcher->getParam('id', 'int', 0);

        $user = User::findFirst($id);
        var_dump($user);
        die();
    }
}
