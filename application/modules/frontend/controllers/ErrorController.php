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
            if ($code <= 0) {
                $code = 500;
            }
        } else {
            $this->view->exception = false;

            $code = 404;
        }

        $this->response->setStatusCode($code, 'test');
        $this->view->setLayout('error');

        $this->view->error = 'Страница не найдена';

        switch ($code) {
            case 404:
                if ($this->view->exception) {
                    return $this->logger->debug((string) $this->view->exception->getMessage());
                }

                $this->logger->debug('Not found: ' . $this->request->getUri());
                $this->view->error = 'Страница не найдена';
                break;
            default:
                $this->logger->critical((string) $this->view->exception->getMessage());
                $this->view->error = 'Извините произошла ошибка. Попробуйте позже.';
                break;
        }
    }
}
