<?php

namespace Api\Controller;

use Phalcon\Mvc\Controller;

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
        
        return array(
            'success' => false,
            'message' => $message,
        );
    }
}
