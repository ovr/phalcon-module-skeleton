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

        $this->view->env = $this->di->getShared('application')->getEnv();

        if ($error instanceof Exception) {
            $this->view->exception = $error;

            $code = $error->getCode();

            if ($code < 400) {
                $code = 400;
            }
        } else {
            $this->view->exception = false;

            $code = 404;
        }

        $this->getDi()->getShared('response')->resetHeaders()->setStatusCode($code, null);
        $this->getDI()->getShared('view')->setLayout('error');

        switch($code) {
            case 404:
                $this->view->error = 'Страница не найдена';
                break;
            default:
                $this->view->error = 'Извините произошла ошибка. Попробуйте позже.';
                break;
        }
    }
}
