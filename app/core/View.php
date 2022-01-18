<?php

namespace app\core;

class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        if (file_exists('app/views/'.$this->path.'.php')){
            ob_start();
            $s = require 'app/views/'.$this->path.'.php';
            $content = ob_get_clean();
            require 'app/views/layouts/'.$this->layout.'.php';
        }else{
            echo 'Вид не найден';
        }

    }

    public static function errorCode($code)
    {
        http_response_code($code);
        require 'app/views/error/'.$code.'.php';
        exit;
    }

    public function redirect($url)
    {
        header('Location: '.$url);
        exit();
    }

    public function message($status, $message) {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url) {
        exit(json_encode(['url' => $url]));
    }
}