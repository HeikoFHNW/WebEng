<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 15.11.2016
 * Time: 10:02
 */
class Route
{
    static function call($controller, $action)
    {
        /**if (isset($_SESSION["login_user"])) {**/
            $controllerFile = '../controller/' . $controller . 'Controller.php';
        /**} else {
            $controllerFile = '../controller/' . 'User' . 'Controller.php';
            $action = 'loginShow';
        }**/
        if (file_exists($controllerFile)) {
            require_once($controllerFile);
            $controllerClass = $controller . "Controller";
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                if (is_callable(array($controller, $action))) {
                    return $controller->{$action}();
                }
            }
        }
        return self::call('Error', 'error');
    }
}