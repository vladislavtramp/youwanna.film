<?php

namespace app\models;

use app\core\Model;

class Admin extends Model
{
    public $error;

    public function loginValidate($post)
    {
        $config = require 'app/config/admin.php';
        if ($config['login'] != $post['login'] || $config['password'] != $post['password']){
            $this->error = $config['login'];
            return false;
        }
        return true;
    }
}