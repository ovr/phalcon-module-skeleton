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
    /**
     * @param integer $id
     * @throws \Phalcon\Exception
     */
    public function viewAction($id)
    {
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

        $this->view->user = $user;
    }
}
