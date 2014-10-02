<?php

namespace OAuth\Controller;

use Phalcon\Exception;
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

        $user = $provider->getUser($accessToken);
        var_dump($user);
    }
}
