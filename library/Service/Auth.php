<?php

namespace App\Service;

use User\Model\User;

/**
 * Class Auth
 * @package App\Service
 */
class Auth extends \Phalcon\Mvc\User\Component
{
    /**
     * Class property for cache getting of User
     *
     * @var User|bool|null
     */
    private $identity;

    /**
     * Get identity
     *
     * @return bool|User
     */
    public function getIdentity()
    {
        if (!is_null($this->identity)) {
            return $this->identity;
        }

        $session = $this->getDI()->get('session');
        $session->start();

        if ($session->get('id')) {
            /**
             * @todo check user after getting
             */
            return $this->identity = User::findFirst($session->get('id'));
        }

        return $this->identity = false;
    }
}
