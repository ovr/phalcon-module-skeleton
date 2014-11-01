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
        $exception  = $this->dispatcher->getParam('exception');

        switch ($exception->getCode()) {
            case 404:
                $message = 'Not found';
                break;
            default:
                $message = 'Houston we have got a problem';
                break;
        }

        return array(
            'success' => false,
            'message' => $message
        );
    }
}
