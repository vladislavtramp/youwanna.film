<?php

namespace app\models;

use app\core\Model;

class Anime extends Model
{
    public function addAnime()
    {
        $params = [
            ':title' => $_POST['title'],
            ':rating' => $_POST['rating'],
            ':image_url' => $_POST['image_url'],
            ':trype' => $_POST['type'],
            ':episodes' => $_POST['episodes'],
            ':status' => $_POST['status'],
            ':genre' => $_POST['genre'],
            ':original_source' => $_POST['original_source'],
            ':season' => $_POST['season'],
            ':comes_out' => $_POST['comes_out'],
            ':studio' => $_POST['studio'],
            ':rating_mpaa' => $_POST['rating_mpaa'],
            ':age_limit' => $_POST['age_limit'],
            ':duration' => $_POST['duration'],
            ':voice_project' => $_POST['voice_project'],
            ':filmed_by' => $_POST['filmed_by'],
            ':description' => $_POST['description'],
            ':video_link' => $_POST['video_link']
        ];


        $sql = 'INSERT INTO anime(title, rating, image_url, type, episodes, status, genre, original_source, season, comes_out, studio, rating_mpaa, age_limit, duration, voice_project, filmed_by, description, video_link) VALUES(:title, :rating, :image_url, :trype, :episodes, :status, :genre, :original_source, :season, :comes_out, :studio, :rating_mpaa, :age_limit, :duration, :voice_project, :filmed_by, :description, :video_link)';

        $this->db->query($sql, $params);
    }

    public function findAnime($id)
    {
        $params = [
            ':id' => $id
        ];

        $sql = 'SELECT * FROM anime WHERE id = :id';

        return $this->db->row($sql, $params);
    }

    public function getAllAnime()
    {

        $sql = 'SELECT * FROM anime';

        return $this->db->row($sql);
    }

    public function addComment(array $post, int $anime)
    {
        $comment = $post['comment'];

        $user = $this->db->fetchUserByToken($_COOKIE['user']);

        $params = [
            ':anime_id' => $anime,
            ':user_id' => $user['id'],
            ':comment' => $comment
        ];

        $sql = 'INSERT INTO comments (anime_id, user_id, comment) VALUES (:anime_id, :user_id, :comment)';
        $this->db->query($sql, $params);
        return $this->getLastComment();
    }

    private function getLastComment()
    {
        $query = 'SELECT * FROM comments ORDER BY `id` DESC LIMIT 1';
        $result = $this->db->fetchRow($query);
        if (is_array($result)) {
            return $result;
        }
        return null;
    }

    public function allComment(string $sql, array $params)
    {
        return $this->db->row($sql);
    }

    public function validateComment(string $comment): array
    {
        $vars = [];

        if ($comment == "" || mb_strlen($comment) > 300) {
            $vars['is-invalid'] = true;
        }

        return $vars;
    }

    public function addFavorites(int $animeId)
    {
        $user = $this->db->fetchUserByToken($_COOKIE['user']);

        $params = [
            ':anime_id' => $animeId,
            ':user_id' => $user['id'],
        ];

        $sql = 'INSERT INTO favorites_anime (anime_id, user_id) VALUES (:anime_id, :user_id)';
        $this->db->query($sql, $params);
    }

    public function fetchFavor($anime, $user)
    {
        $validate = [];

        $params = [
            ':anime_id' => $anime,
            ':user_id' => $user
        ];

        $sql = 'SELECT anime_id, user_id FROM favorites_anime WHERE anime_id = :anime_id AND user_id = :user_id';

        $result = $this->db->fetchRow($sql, $params);

        if (!empty($result)) {
            $validate['already_add'] = true;
        }

        return $validate;
    }

    public function searchAnime(string $text)
    {
        $params = [
            ':text' => $text
        ];

        $sql = "SELECT * FROM anime WHERE title LIKE CONCAT('%', :text, '%')";

        return $this->db->row($sql, $params);
    }
}