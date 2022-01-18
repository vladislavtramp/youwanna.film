<?php

namespace app\lib;
use PDO;

class Db
{
    protected $db;

    public function __construct()
    {
        $config = require 'app/config/db.php';
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['user'], $config['pass']);
    }

    public function query(string $sql, array $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function row(string $sql, array $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchRow(string $sql, array $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function column(string $sql, array $params = []): object
    {
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }

    public function fetchUserByToken(string $token)
    {
        $sql = 'SELECT * FROM users WHERE token = :token';

        $params = [
            ':token' => $token
        ];

        $result =  $this->query($sql, $params);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchUserById(int $id)
    {
        $sql = 'SELECT id, login, age, about_user, token, user_group, image_profile, image_profile_bg, created_at FROM users WHERE id = :id';

        $params = [
            ':id' => $id
        ];

        $result =  $this->query($sql, $params);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function fetchRequestFriendship(int $user)
    {
        $sql = 'SELECT users.login, users.image_profile, users.id, friend_users.request_status FROM users LEFT JOIN friend_users ON users.id = friend_users.user_id WHERE friend_users.user_friend_id = :id';

        $params = [
            ':id' => $user
        ];

        return $this->row($sql, $params);
    }

    public function fetchFriends(int $user)
    {
        $sql = 'SELECT users.login, users.id, users.image_profile, friend_users.request_status FROM users LEFT JOIN friend_users ON friend_users.user_id = users.id OR friend_users.user_friend_id = users.id WHERE friend_users.user_friend_id = :id OR friend_users.user_id = :id';

        $params = [
            ':id' => $user
        ];

        return $this->row($sql, $params);
    }
}