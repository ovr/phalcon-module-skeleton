<?php

namespace Api\Controller;

use Phalcon\Mvc\Controller;
use Phalcony\Application;

class IndexController extends Controller
{
    public function testAction()
    {
        return array(
            'success' => true,
            'version' => 1.0
        );
    }

    /**
     * @return array
     */
    public function errorAction()
    {
        $this->response->setStatusCode(404, 'Not found');
        $this->logger->debug('Error to handle: ' . $this->request->getURI());
                
        return array(
            'success' => false,
            'url' => $this->request->getURI(),
            'parameters' => $this->dispatcher->getParams()
        );
    }

    /**
     * @return array
     */
    public function exceptionAction()
    {
        /**
         * @var $exception \Exception
         */
        $exception  = $this->dispatcher->getParam('exception');

        $message = $exception->getMessage();
        if (empty($message)) {
            $message = 'Houston we have got a problem';
        }
        
        if ($this->application->getEnv() == Application::ENV_PRODUCTION) {
            switch ($exception->getCode()) {
                case 500:
                    $this->logger->critical((string) $exception);
                    break;
                default:
                    $this->logger->debug((string) $exception);
                    break;
            }
        } else {
            $this->logger->debug((string) $exception);
        }

        return array(
            'success' => false,
            'message' => $message,
        );
    }
}
