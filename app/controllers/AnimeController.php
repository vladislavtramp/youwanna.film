<?php

namespace app\controllers;

use app\core\Controller;
use app\lib\Db;
use app\models\Anime;

class AnimeController extends Controller
{
    public function allAction()
    {
        $db = new Db();

        if ($_COOKIE['user']) {
            $user = $db->fetchUserByToken($_COOKIE['user']);
        }

        $model = new Anime();
        $result = $model->getAllAnime();

        $vars = [
            'animes' => $result,
            'user' => $user
        ];

        $this->view->render('Все Аниме', $vars);
    }

    public function searchAction()
    {
        $db = new Db();

        if ($_COOKIE['user']) {
            $user = $db->fetchUserByToken($_COOKIE['user']);
        }
        if (!isset($_POST['find_submit']) || empty($_POST['text'])) {

        } else {


            $model = new Anime();

            $result = $model->searchAnime($_POST['text']);
        }
        $vars = [
            'animes' => $result,
            'user' => $user
        ];

        $this->view->render('Все Аниме', $vars);
    }

    public function animeAction()
    {
        $db = new Db();
        $model = new Anime();
        $animeId = $this->route['id'];

        if ($_COOKIE['user']) {
            $user = $db->fetchUserByToken($_COOKIE['user']);

            if (!empty($user) && isset($_POST['favorites_submit'])) {
                $model->addFavorites($animeId);
            }

            $valFavor = $model->fetchFavor($animeId, $user['id']);
        }

        $result = $model->findAnime($this->route['id']);

        if (isset($_POST['comment_submit'])) {
            $commentError = $model->validateComment($_POST['comment']);

            if (!isset($commentError['is-invalid'])) {
                $model->addComment($_POST, $animeId);
                echo "zalupa";
                exit;
            }
        }

        $params = [
            ':id' => $animeId
        ];
        $sql = 'SELECT users.login, users.image_profile, comments.id, comments.comment, comments.created_at FROM users LEFT JOIN comments ON users.id = comments.user_id WHERE anime_id = :id';
        $comments = $db->row($sql, $params);


        $vars = [
            'anime' => $result[0],
            'user' => $user,
            'comError' => $commentError,
            'comments' => $comments,
            'valFavor' => $valFavor,
        ];

        $this->view->render('Смотреть Аниме', $vars);


    }

    public function animeCommentAction()
    {
        $db = new Db();
        $user = $db->fetchUserByToken($_COOKIE['user']);
        $comment = (new Anime())->addComment($_POST, $this->route['id']);
        $this->response->json([
            'comment' => $comment ? [
                'id' => $comment['id'],
                'created_at' => date('H:i', strtotime($comment['created_at']))
            ] : null,
            'user' => [
                'name' => $user['name'],
                'avatar' => $user['image_profile']
            ]]);
    }
}