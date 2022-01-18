<?php

namespace app\core;

class Response
{
    public function json($params = [])
    {
        header('Content-Type: application/json');
        echo json_encode($params);
        exit;
    }
}