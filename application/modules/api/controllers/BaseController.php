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
    /**
     * @param int $default
     * @param int $maxLimit
     * @return mixed|void
     * @throws Exception
     */
    protected function getQueryLimit($default = 100, $maxLimit = 500)
    {
        $limit = (int) $this->request->get('limit', ['trim', 'int'], $default);
        if ($limit <= 0) {
            throw new Exception('Limit must be > 0');
        } else if ($limit > $maxLimit) {
            throw new Exception('Limit must be <= ' . $maxLimit);
        }

        return $limit;
    }

    /**
     * @return int
     * @throws Exception
     */
    protected function getQueryPage()
    {
        $page = (int) $this->request->get('page', ['trim', 'int'], 1);
        if ($page < 1) {
            throw new Exception('Page must be > 0');
        }

        return $page;
    }
}
