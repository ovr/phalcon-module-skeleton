<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace OAuth;

use Phalcon\DiInterface;
use SocialConnect\Auth\Service;
use SocialConnect\Common\Http\Client\Curl;

class Module implements \Phalcon\Mvc\ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $dependencyInjector = NULL)
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'OAuth\Controller' => APPLICATION_PATH . '/modules/oauth/controllers/',
            'OAuth\Model' => APPLICATION_PATH . '/modules/oauth/models/',
        ));
        $loader->register();
    }

    public function registerServices(DiInterface $di = null)
    {
        $dispatcher = $di->get('dispatcher');
        $dispatcher->setDefaultNamespace('OAuth\Controller');

        /**
         * @var $application \Phalcony\Application
         */
        $application = $di->get('application');

        $oauthService = new Service($application->getParameters('oauth'), null);
        $oauthService->setHttpClient(new Curl());

        $di->set('oauth', $oauthService);

        /**
         * @var $view \Phalcon\Mvc\View
         */
        $view = $di->get('view');
        $view->setLayout('index');
        $view->setViewsDir(APPLICATION_PATH . '/modules/oauth/views/');
        $view->setLayoutsDir('../../common/layouts/');
        $view->setPartialsDir('../../common/partials/');

        $di->set('view', $view);
    }
}
