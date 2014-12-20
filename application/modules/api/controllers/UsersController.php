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
        $limit = $this->request->get('limit', ['trim', 'int'], 100);
        if ($limit <= 0) {
            throw new \Exception('Limit must be > 0');
        } else if ($limit > 500) {
            throw new \Exception('Limit must be <= 500');
        }

        $page = $this->request->get('page', ['trim', 'int'], 1);
        if ($page < 1) {
            throw new \Exception('Page must be > 0');
        }

        $builder = $this->modelsManager->createBuilder()
            ->from('User\Model\User')
            ->orderBy('id DESC');

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
                'nick' => $user->nick,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname
            )
        );
    }
}
