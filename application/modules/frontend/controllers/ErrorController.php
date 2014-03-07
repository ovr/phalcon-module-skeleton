<?php

namespace Frontend\Controller;

use Exception;

class ErrorController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        /**
         * @var Exception
         */
        $error = $this->dispatcher->getParam('error');
        if ($error instanceof Exception) {
            $code = $error->getCode();
        } else {
            $code = 404;
        }

        $this->getDi()->getShared('response')->resetHeaders()->setStatusCode($code, null);
        $this->getDI()->getShared('view')->setLayout('error');

        switch($code) {
            case 404:
                $this->view->error = 'Страница не найдена';
                break;
        }
    }
}
