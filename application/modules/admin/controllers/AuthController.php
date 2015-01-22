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
    /**
     * Login action
     */
    public function loginAction()
    {
        $this->view->setLayout('empty-layout');

        $form = new Login();

        if ($this->request->isPost()) {
            try {
                if ($form->isValid($this->request->getPost())) {
                    $user = \User\Model\User::findFirst(1);

                    /**
                     * @var $authService \App\Service\Auth
                     */
                    $authService = $this->di->get('auth');
                    
                    /**
                     * @todo Rewrite for AuthService with check
                     */
                    $authService->authByUser($user);

                    $this->response->redirect(array('for' => 'admin'));
                } else {
                    //@todo Implement it
                }
            } catch (\Exception $e) {
                $this->flash->error($e->getMessage());
            }
        }

        $this->view->form = $form;
    }

    /**
     * Logout action
     */
    public function logoutAction()
    {
        $this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);

        $this->session->start();
        $this->session->destroy();

        $this->response->redirect();
    }
}
