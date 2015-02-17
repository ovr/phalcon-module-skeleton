<?php

namespace App;

use User\Model\User;

/**
 * Class Tag
 * @package App
 */
class Tag extends \Phalcon\Tag
{
    /**
     * @param User $user
     * @param string $size
     * @param bool $absolute
     * @return mixed
     */
    public static function userPhotoUrl(User $user, $size = 'normal', $absolute = false)
    {
        return self::getUrlService()->getStatic('user/' . $user->id . '.jpg');
    }

    /**
     * Get url by route name and parameters
     *
     * @param $routename
     * @param array $parameters
     * @return string
     */
    public static function url($routename, array $parameters = null)
    {
        if (is_null($parameters)) {
            return self::getUrlService()->get(array(
                'for' => $routename
            ));
        }

        return self::getUrlService()->get(array_merge(
            array(
                'for' => $routename
            ),
            $parameters
        ));
    }

    /**
     * Get url by parameters
     *
     * @param $module
     * @param string $controller
     * @param string $action
     * @return string
     */
    public static function u($module, $controller = null, $action = null)
    {
        /**
         * @todo rewrite with routers
         */
        if ($controller) {
            if ($action) {
                return '/' . $module . '/' . $controller . '/' . $action . '/';
            }

            return '/' . $module . '/' . $controller . '/';
        }

        return self::getUrlService()->get(array(
            'for' => $module
        ));
    }
}
