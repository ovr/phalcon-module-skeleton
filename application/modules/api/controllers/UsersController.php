<?php

namespace Api\Controller;

use Exception;
use Phalcon\Mvc\Controller;
use Phalcon\Paginator\Adapter\QueryBuilder;
use User\Model\User;

/**
 * Class UsersController
 * @package Api\Controller
 */
class UsersController extends BaseController
{
    public function indexAction()
    {
        $limit = $this->getQueryLimit();
        $page = $this->getQueryPage();

        $builder = $this->modelsManager->createBuilder()
            ->from('User\Model\User')
            ->orderBy('id ASC');

        $paginator = new QueryBuilder(array(
            "builder" => $builder,
            "limit"=> $limit,
            "page" => $page
        ));


        $result = array();
        $page = $paginator->getPaginate();

        /**
         * @var $user  User
         */
        foreach ($page->items as $user) {
            $result[] = [
                'id' => $user->id,
                'nick' => $user->nick,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname
            ];
        }

        return array(
            'success' => true,
            'result' => array(
                'users' => $result,
                'pages' => $page->total_pages,
                'total' => $page->total_items
            )
        );
    }

    public function getAction($id)
    {
        if ($id <= 0) {
            throw new Exception('Wrong id passed', 500);
        }

        /**
         * @var $user User|boolean
         */
        $user = User::findFirst($id);
        if (!$user) {
            throw new Exception('User not found', 404);
        }

        return array(
            'success' => true,
            'result' => array(
                'id' => $user->id,
                'nick' => $user->nick,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname
            )
        );
    }
}
