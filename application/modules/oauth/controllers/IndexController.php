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

    }
}
