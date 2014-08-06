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
}
