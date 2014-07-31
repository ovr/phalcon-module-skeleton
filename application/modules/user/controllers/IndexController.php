<?php

namespace User\Controller;

use Phalcon\Exception;
use Phalcon\Mvc\Controller;
use User\Model\User;

/**
 * Class IndexController
 * @package User\Controller
 */
class IndexController extends Controller
{
    public function viewAction()
    {
        $id = $this->dispatcher->getParam('id', 'int', 0);

        if ($id <= 0) {
            throw new Exception('Wrong id passed', 404);
        }

        /**
         * @var bool|User $user
         */
        $user = User::findFirst($id);
        if (!$user) {
            throw new Exception('Can`t find user by id = ' . $id, 404);
        }

        if (!$user->publish) {
            throw new Exception('User is not published', 404);
        }

        if ($user->deleted) {
            throw new Exception('User was deleted', 404);
        }

        $this->user = $user;
    }
}
