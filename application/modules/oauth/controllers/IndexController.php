<?php

namespace OAuth\Controller;

use OAuth\Model\User as OAuthUser;
use Phalcon\Mvc\Controller;
use User\Model\User;

/**
 * Class IndexController
 * @package OAuth\Controller
 */
class IndexController extends Controller
{
    /**
     * @return \SocialConnect\Auth\Service
     */
    public function getService()
    {
        return $this->getDI()->get('oauth');
    }

    public function initialize()
    {
        $this->identity = $this->di->get('auth')->getIdentity();

        if ($this->identity) {
            $this->dispatcher->forward(array(
                'action' => 'success'
            ));
        }
    }

    public function indexAction($providerName)
    {
        try {
            $provider = $this->getService()->getProvider($providerName);
            $this->response->redirect($provider->makeAuthUrl(), true);
        } catch (\Exception $e) {

        }
    }

    /**
     * @todo Move it to DB|Model
     *
     * @param $provider
     * @return int
     */
    public function getProviderType($provider)
    {
        switch ($provider) {
            case 'facebook':
                return 1;
            case 'github':
                return 2;
            case 'vk':
                return 3;
        }
    }

    public function callbackAction()
    {
        $providerName = strtolower($this->request->get('provider', array('trim'), false));

        switch ($providerName) {
            case 'facebook':
            case 'github':
            case 'vk':
                $provider = $this->getService()->getProvider($providerName);
                break;
            default:
                throw new \Exception('Wrong $provider passed in url : ' . $providerName);
                break;
        }

        $code = $_GET['code'];

        var_dump(array(
            'code' => $code
        ));

        $accessToken = $provider->getAccessToken($code);
        var_dump($accessToken);

        /**
         * @var $socialUser \SocialConnect\Common\Entity\User
         */
        $socialUser = $provider->getUser($accessToken);
        var_dump($socialUser);

        $socialId = $this->getProviderType($providerName);

        /**
         * @var $oauthRelation \OAuth\Model\User
         */
        $oauthRelation = OAuthUser::findFirst(array(
            'socialId = ?0 AND identifier = ?1',
            'bind' => array($socialId, $socialUser->id)
        ));

        /**
         * @var $auth \App\Service\Auth
         */
        $auth = $this->di->get('auth');

        if ($oauthRelation) {
            $user = $oauthRelation->getRelated('User');
            if (!$user) {
                throw new \Exception('Can`t find user with id = ' . $oauthRelation->userId);
            }
        } else {
            $user = User::findFirst(array(
                'email = ?0',
                'bind' => array($socialUser->email)
            ));

            if (!$user) {
                $user = $auth->registerUser(array(
                    'firstname' => $socialUser->firstname,
                    'lastname' => $socialUser->lastname,
                    'email' => $socialUser->email
                ));
                $user->refresh();
            }

            $oauthRelation = new OAuthUser();
            $oauthRelation->identifier = $socialUser->id;
            $oauthRelation->socialId = $socialId;
            $oauthRelation->userId  = $user->id;
            $oauthRelation->save();
        }

        $auth->authByUser($user);
    }

    public function successAction()
    {

    }

    public function failedAction()
    {

    }
}
