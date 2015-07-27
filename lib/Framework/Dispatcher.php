<?php
namespace Framework;


final class Dispatcher
{
    public function dispatch()
    {
        $globb = explode('/', preg_replace('~^' . Basepath::get() . '~', '', $_SERVER['REQUEST_URI']));
        $controllerName = isset($globb[0]) && $globb[0] ? $globb[0] : 'index';
        $action = isset($globb[1]) && $globb[1] ? $globb[1] : 'index';
        $controller = '\Project\Controller\\' . ucfirst($controllerName);
        if (!class_exists($controller)) {
            throw new \Exception('controller ' . $controllerName . ' not found');
        };
        $controller = new $controller;
        $action = $action . 'Action';
        if (!method_exists($controller, $action)) {
            throw new \Exception('action ' . $action . ' not found in controller ' . $controllerName);
        }
        $controller->$action();
    }
}
