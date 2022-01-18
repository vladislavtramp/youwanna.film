<?php

namespace app\models;

use app\core\Model;
use app\lib\Db;

class Account extends Model
{
    const STATUS_FRIEND = 2;

    public function storeUser(string $name, string $login, string $password, string $email): void
    {
        $pwd = password_hash($password, PASSWORD_DEFAULT);

        $db = new Db();

        $params = [
            ':name' => $name,
            ':login' => $login,
            ':password' => $pwd,
            ':email' => $email
        ];

        $sql = 'INSERT INTO users(name, login, password, email) VALUES(:name, :login, :password, :email)';
        $db->query($sql, $params);
    }

    public function validateRegister(array $data)
    {
        $errors = [];

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = true;
        }

        if (empty($data['name'])) {
            $errors['name'] = true;
        }

        if (empty($data['login'])) {
            $errors['login'] = true;
        }

        if (empty($data['password']) || empty($data['confirmPassword']) || $data['password'] != $data['confirmPassword']) {
            $errors['password'] = true;
        }

        return $errors;

    }

    public function validateLogin(array $data)
    {
        $db = new Db();

        $errors = [];

        $login = $data['login'];
        $password = $data['password'];

        $params = [
            ':login' => $login
        ];

        $sql = 'SELECT * FROM users WHERE login = :login';

        $user = $db->fetchRow($sql, $params);

        if (!$user || !password_verify($password, $user['password'])) {
            $errors['invalid'] = true;
        }

        return $errors;
    }

    public function generateTokenByUser(
        int    $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string
    {
        if ($length < 1) {
            throw new \RangeException("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces [] = $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    public function updateTokenByUser(int $userId, string $token)
    {
        $db = new Db();

        $sql = 'UPDATE users SET token = :token WHERE id = :id ';

        $params = [
            ':token' => $token,
            ':id' => $userId
        ];

        $db->fetchRow($sql, $params);
    }

    public function fetchUserByLogin(string $login): array
    {
        $db = new Db();

        $sql = 'SELECT * FROM users WHERE login = :login';

        $params = [
            'login' => $login
        ];

        return $db->fetchRow($sql, $params);
    }

    public function fetchUserAnime(int $user)
    {
        $params = [
            ':id' => $user
        ];
        $sql = 'SELECT anime.id, anime.title, anime.genre, anime.image_url, anime.episodes, anime.type, anime.studio FROM anime LEFT JOIN favorites_anime ON anime_id = anime.id WHERE user_id = :id';

        return $this->db->row($sql, $params);
    }

    public function addFriend(int $user, int $friend)
    {
        $vars = [
            ':user' => $user,
            ':friend' => $friend,
            ':status' => 1
        ];

        $sql = 'INSERT INTO friend_users (user_id, user_friend_id, request_status) VALUES (:user, :friend, :status)';

        $this->db->query($sql, $vars);
    }

    public function acceptFriend(int $friend, int $user): void
    {
        $params = [
            ':friend' => $friend,
            ':user' => $user
        ];
        $sql = 'UPDATE friend_users SET request_status = 2 WHERE user_id = :friend AND user_friend_id = :user ';

        $this->db->query($sql, $params);
    }

    public function validateFriend(int $currentUser, int $user)
    {
        $val = [];

        $params = [
            ':currentUser' => $currentUser,
            ':user' => $user
        ];
        $sql1 = 'SELECT user_id, user_friend_id, request_status FROM friend_users WHERE (user_id = :currentUser AND user_friend_id = :user) or ( user_id = :user AND user_friend_id = :currentUser) limit 1';


        $friendRow = $this->db->fetchRow($sql1, $params);

        if (empty($friendRow)) {
            return $val;
        }
        $friend = new Friend(
            (int)$friendRow['user_id'],
            (int)$friendRow['user_friend_id'],
            (int)$friendRow['request_status']
        );

        $val['yourFollow'] = $friend->isFollowerOf($currentUser);
        $val['userFollow'] = $friend->isUserFollower($currentUser);
        $val['yourFriend'] = $friend->isYourFriend();

        return $val;
    }
    public function sendMessage(int $currentUser, int $user, string $message): void
    {
        $params = [
            ':currentUser' => $currentUser,
            ':user' => $user,
            ':message'=> $message
        ];

        $sql = 'INSERT INTO messages (user_send_id, user_recive_id, message) VALUES (:currentUser, :user, :message)';

        $this->db->query($sql, $params);
    }
    public function searchMessage(int $currentUser, int $user)
    {
        $params = [
            ':currentUser' => $currentUser,
            ':user' => $user
        ];

        $sql = 'SELECT * FROM messages WHERE (user_send_id = :currentUser AND user_recive_id = :user) or ( user_send_id = :user AND user_recive_id = :currentUser)';

        return $this->db->row($sql, $params);
    }
}