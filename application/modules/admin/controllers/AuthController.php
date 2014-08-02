<?php

namespace Admin\Controller;

use Phalcon\Mvc\Controller;
use Admin\Form\Login;

/**
 * Class AuthController
 * @package Admin\Controller
 */
class AuthController extends Controller
{
    public function initialize()
    {
        $this->view->setLayout('empty-layout');
    }

    public function loginAction()
    {
        $form = new Login();

        if ($this->request->isPost()) {
            try {
                if ($form->isValid($this->request->getPost())) {
                    /**
                     * @todo Rewrite for AuthService with check
                     */
                    $this->session->start();
                    $this->session->set('id', '1');

                    $this->response->redirect(array('for' => 'admin'));
                } else {

                }
            } catch (\Exception $e) {
                $this->flash->error($e->getMessage());
            }
        }

        $this->view->form = $form;
    }
}
