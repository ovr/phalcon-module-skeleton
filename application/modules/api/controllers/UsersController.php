<?php

namespace Api\Controller;

use Phalcon\Mvc\Controller;
use User\Model\User;

/**
 * Class UsersController
 * @package Api\Controller
 */
class UsersController extends Controller
{
    public function indexAction()
    {
        /**
         * @var $users  User[]
         */
        $users = User::find();

        $result = array();

        foreach ($users as $user) {
            $result[] = [
                'id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
            ];
        }

        return array(
            'success' => true,
            'result' => $result
        );
    }

    public function getAction($id)
    {
        if ($id <= 0) {
            throw new \Exception('Wrong id passed');
        }

        $user = User::findFirst($id);
        if (!$user) {
            throw new \Exception('Not found');
        }


        return array(
            'success' => true,
            'result' => array(
                'id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname
            )
        );
    }
}
