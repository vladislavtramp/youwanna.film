<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Anime;
use app\models\Admin;

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction(){

        $val = new Admin();

        if (!empty($_POST)){
            if (!$val->contactValidate($_POST)){
                $this->view->message('error', 'error');
            }
            $this->view->message('success', 'OK');
        }

        $this->view->render('Admin Panel');

    }
    public function addAction(){
        $anime = new Anime();

        if (!empty($_POST)){
            $anime->addAnime();
        }
        $this->view->render('Add Anime');

    }
    public function editAction(){

        $this->view->render('Edit Anime');

    }
    public function logoutAction(){
        exit('Выход');
    }
    public function deleteAction(){
        exit('Удаление');
    }

}