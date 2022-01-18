<?php

namespace app\core;

abstract class Controller
{
    public $route;
    public $view;
    public $response;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
        $this->response = new Response();
    }

    public function loadModel($name)
    {
        $path = 'app\models\\'.ucfirst($name);
        if (class_exists($path)){
            return new $path;
        }
    }
}