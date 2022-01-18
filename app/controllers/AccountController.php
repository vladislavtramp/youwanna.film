<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Account;

class AccountController extends Controller
{
    public function loginAction()
    {
        if ($_COOKIE['user']) {
            header('Location: /');
        } else {
            if (isset($_POST['login_submit'])) {

                $login = $_POST['login'];
                $acc = new Account();
                $errors = $acc->validateLogin($_POST);

                if (empty($errors)) {
                    $user = $acc->fetchUserByLogin($login);
                    $token = $acc->generateTokenByUser();
                    $acc->updateTokenByUser($user['id'], $token);
                    setcookie('user', $token);
                    header('Location: /');
                }

                $vars = [
                    'validate' => $errors
                ];


            }
            $this->view->render('Авторизация', $vars);
        }
    }

    public function registerAction()
    {
        $db = new Db();

        if ($_COOKIE['user']) {
            header('Location: /');
        } else {
            if (isset($_POST['register_submit'])) {

                $name = $_POST['name'];
                $login = $_POST['login'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $acc = new Account();

                $errors = $acc->validateRegister($_POST);

                if (empty($errors)) {
                    $acc->storeUser($name, $login, $password, $email);

                }
            }
            $vars = [
                'validate' => $errors
            ];

            $this->view->render('Регистрация', $vars);

        }
    }

    public function profileAction()
    {
        $db = new Db();

        if ($_COOKIE['user']) {
            $user = $db->fetchUserByToken($_COOKIE['user']);
            if ($user['token'] === $_COOKIE['user']) {
                $vars = [
                    'user' => $user
                ];
                $this->view->render('Мой профиль', $vars);
            } else
                header('Location: /login');
        } else {
            header('Location: /login');
        }
    }

    public function animeListAction()
    {
        $db = new Db();

        if ($_COOKIE['user']) {
            $user = $db->fetchUserByToken($_COOKIE['user']);
            if ($user['token'] === $_COOKIE['user']) {
                $acc = new Account();

                $animeList = $acc->fetchUserAnime($user['id']);

                $vars = [
                    'user' => $user,
                    'animes' => $animeList
                ];
                $this->view->render('Список аниме', $vars);
            } else
                header('Location: /login');
        } else {
            header('Location: /login');
        }
    }

    public function messageAction()
    {
        $db = new Db();

        if ($_COOKIE['user']) {
            $user = $db->fetchUserByToken($_COOKIE['user']);
            if ($user['token'] === $_COOKIE['user']) {
                $fetchFriends = $db->fetchFriends($user['id']);

                $vars = [
                    'user' => $user,
                    'fetchFriends' => $fetchFriends
                ];
                $this->view->render('Мой профиль', $vars);
            } else
                header('Location: /login');
        } else {
            header('Location: /login');
        }
    }
    public function messengerAction()
    {
        $db = new Db();

        if ($_COOKIE['user']) {
            $user = $db->fetchUserByToken($_COOKIE['user']);
            if ($user['token'] === $_COOKIE['user']) {
                $acc = new Account();
                $valMessage = [];
                $fetchFriends = $db->fetchFriends($user['id']);
                $findMessage = $acc->searchMessage($user['id'], $this->route['id']);
                $fetchUser = $acc->db->fetchUserById($this->route['id']);


                if (isset($_POST['message_submit']) && !empty($_POST['message'])){
                    $acc->sendMessage($user['id'], $this->route['id'], $_POST['message']);
                } else {
                    $valMessage['is-invalid'] = true;
                }

                $vars = [
                    'user' => $user,
                    'fetchFriends' => $fetchFriends,
                    'messages' => $findMessage,
                    'valMessage' => $valMessage,
                    'fetchUser' => $fetchUser
                ];

                $this->view->render('Мой профиль', $vars);
            } else
                header('Location: /login');
        } else {
            header('Location: /login');
        }
    }

    public function friendsAction()
    {

        $db = new Db();

        if (!$_COOKIE['user']) {
            header('Location: /login');
            return;
        }
        $acc = new Account();
        $user = $db->fetchUserByToken($_COOKIE['user']);
        if ($user['token'] === $_COOKIE['user']) {
            $result = $db->fetchRequestFriendship($user['id']);
            $fetchFriends = $db->fetchFriends($user['id']);

            $vars = [
                'user' => $user,
                'friends' => $result,
                'fetchFriends' => $fetchFriends
            ];

            if (isset($_POST['accept'])) {
                $friend = (int)$_POST['accept'];
                $acc->acceptFriend($friend, $user['id']);
            }

            $this->view->render('Мой профиль', $vars);

        } else
            header('Location: /login');
    }

    public function userAction()
    {
        $acc = new Account();
        $result = $acc->db->fetchUserById($this->route['id']);
        if ($_COOKIE['user']) {
            $user = $acc->db->fetchUserByToken($_COOKIE['user']);
            $fetchFriend = $acc->validateFriend((int)$user['id'], (int)$this->route['id']);

            if (isset($_POST['add_friend_submit'])) {
                $acc->addFriend($user['id'], $this->route['id']);
            }
        }


        $vars = [
            'user' => $user,
            'userProfile' => $result,
            'valFriend' => $fetchFriend
        ];

        $this->view->render($result['login'], $vars);

    }
}