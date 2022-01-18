<?php

namespace app\models;

use app\core\Model;

class Main extends Model
{

    public function mainAnime()
    {
        $sql = 'SELECT title, image_url, rating, id FROM anime WHERE season = "Осень 2021"';
        $result = $this->db->row($sql);
        return $result;
    }

    public function contactValidate($post): bool
    {

        if (mb_strlen($post['name']) <= 1 || mb_strlen($post['name']) > 20){

            return false;

        }elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
            return false;
        }elseif (mb_strlen($post['text']) < 10 || mb_strlen($post['text']) > 500){
            return false;
        }
        return true;
    }
}