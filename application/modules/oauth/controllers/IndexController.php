<?php

namespace OAuth\Controller;

use OAuth\Model\User as OAuthUser;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;
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


    public function indexAction($providerName)
    {
        $this->identity = $this->di->get('auth')->getIdentity();

        if ($this->identity) {
            $this->successAction();
        }

        try {
            $provider = $this->getService()->getProvider($providerName);
            $this->response->redirect($provider->makeAuthUrl(), true)->send();
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

        $code = $this->request->get('code', ['trim']);
        $accessToken = $provider->getAccessToken($code);

        try {
            /**
             * @var $socialUser \SocialConnect\Common\Entity\User
             */
            $socialUser = $provider->getUser($accessToken);
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
                $user = $oauthRelation->getUser();
                if (!$user) {
                    throw new \Exception('Can`t find user with id = ' . $oauthRelation->userId);
                }
            } else {
                $user = User::findFirst(array(
                    'email = ?0',
                    'bind' => array($socialUser->email)
                ));

                if (!$user) {
                    $userValues = [];

                    if ($socialUser->email) {
                        $userValues['email'] = $socialUser->email;
                    }

                    if ($socialUser->firstname) {
                        $userValues['firstname'] = $socialUser->firstname;
                    }

                    if ($socialUser->lastname) {
                        $userValues['lastname'] = $socialUser->lastname;
                    }

                    if ($socialUser->name) {
                        list($fistname, $lastname) = explode(' ', trim($socialUser->name));

                        if ($fistname) {
                            $userValues['firstname'] = $fistname;
                        }

                        if ($lastname) {
                            $userValues['lastname'] = $lastname;
                        }
                    }

                    $user = $auth->registerUser($userValues);
                    $user->refresh();
                }

                $oauthRelation = new OAuthUser();
                $oauthRelation->identifier = $socialUser->id;
                $oauthRelation->socialId = $socialId;
                $oauthRelation->userId  = $user->id;
                $oauthRelation->save();
            }

            $auth->authByUser($user);

            $this->successAction();
        } catch (\Exception $e) {
            /**
             * @var $logger \Phalcon\Logger\Adapter
             */
            $logger = $this->getDI()->get('log');
            $logger->critical($e->getMessage());

            $this->failedAction();
        }
    }

    public function successAction()
    {
        $this->response->redirect('/', true)->send();
    }

    public function failedAction()
    {

    }
}
