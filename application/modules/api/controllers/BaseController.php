<?php

namespace Api\Controller;

use Exception;
use Phalcon\Mvc\Controller;

/**
 * Class UsersController
 * @package Api\Controller
 */
class BaseController extends Controller
{
    protected function getQueryLimit($default = 100, $maxLimit = 500)
    {
        $limit = $this->request->get('limit', ['trim', 'int'], $default);
        if ($limit <= 0) {
            throw new Exception('Limit must be > 0');
        } else if ($limit > $maxLimit) {
            throw new Exception('Limit must be <= ' . $maxLimit);
        }

        return $limit;
    }
}
