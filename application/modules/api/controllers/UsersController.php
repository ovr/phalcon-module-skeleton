<?php

namespace Api\Controller;

use Phalcon\Mvc\Controller;
use Phalcon\Paginator\Adapter\QueryBuilder;
use User\Model\User;

/**
 * Class UsersController
 * @package Api\Controller
 */
class UsersController extends Controller
{
    public function indexAction()
    {
        $builder = $this->modelsManager->createBuilder()
            ->from('User\Model\User')
            ->orderBy('id DESC');

        $paginator = new QueryBuilder(array(
            "builder" => $builder,
            "limit"=> 20,
            "page" => 1
        ));


        $result = array();
        $page = $paginator->getPaginate();

        /**
         * @var $user  User
         */
        foreach ($page->items as $user) {
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
            throw new \Exception('Wrong id passed', 500);
        }

        /**
         * @var $user User|boolean
         */
        $user = User::findFirst($id);
        if (!$user) {
            throw new \Exception('User not found', 404);
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
