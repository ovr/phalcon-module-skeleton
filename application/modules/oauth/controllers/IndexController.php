<?php

namespace OAuth\Controller;

use OAuth\Model\User as OAuthUser;
use Phalcon\Mvc\Controller;

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
        $provider = strtolower($this->request->get('provider', array('trim'), false));

        switch ($provider) {
            case 'facebook':
            case 'github':
            case 'vk':
                $provider = $this->getService()->getProvider($provider);
                break;
            default:
                throw new \Exception('Wrong $provider passed in url : ' . $provider);
                break;
        }

        $code = $_GET['code'];

        var_dump(array(
            'code' => $code
        ));

        $accessToken = $provider->getAccessToken($code);
        var_dump($accessToken);

        /**
         * @var $user \SocialConnect\Common\Entity\User
         */
        $user = $provider->getUser($accessToken);
        var_dump($user);

        $socialId = $this->getProviderType($provider);

        $oauthRelation = OAuthUser::findFirst(array(
            'socialId = ?0 AND identifier = ?1',
            'bind' => array($socialId, $user->id)
        ));

        if ($oauthRelation) {

        } else {
            $oauthRelation = new OAuthUser();
            $oauthRelation->identifier = $user->id;
            $oauthRelation->socialId = $socialId;
            $oauthRelation->save();
        }
    }
}
