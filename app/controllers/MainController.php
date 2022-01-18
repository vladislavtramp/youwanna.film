<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Main;

class MainController extends Controller
{
    public function indexAction()
    {
        $db = new Db();
        if ($_COOKIE['user']){
            $user = $db->fetchUserByToken($_COOKIE['user']);
        }

        $main = new Main();

        $result = $main->mainAnime();

        $vars = [
            'mainAnimes' => $result,
            'user' => $user
        ];
        $this->view->render('Главная страница', $vars);

    }

    public function contactAction()
    {
        $main = new Main();

        if (!empty($_POST)){
            if (!$main->contactValidate($_POST)){
                $this->view->message('error', 'error');
            }
            $this->view->message('success', 'OK');
        }
        $this->view->render('Контакты');

    }
}