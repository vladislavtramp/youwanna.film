<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>You Wanna FilM?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/public/styles/anime.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/public/scripts/anime.js"></script>
</head>
<body>
<div style="background-color: #ececec">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(20,20,20,0.87)">
        <div class="container-fluid">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand" href="/">YWF</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-tarcsget="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/anime/all">Аниме</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Манга</a>
                        </li>
                    </ul>
                    <form class="d-flex me-3">
                        <input class="form-control me-2" type="search" placeholder="Введите аниме" aria-label="Search">
                        <button type="submit" class="btn btn-success">Найти</button>
                    </form>
                    <? if (!isset($user['login'])): ?>
                        <li class="nav-item">
                            <a href="/login" class="btn btn-outline-primary me-1">Войти в аккаунт</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="btn btn-outline-info">Зарегестрироваться</a>
                        </li>
                    <? else: ?>
                        <div style="margin-left: 10px; margin-right: 20px">
                            <a href="/profile" style="text-decoration: none; color: white;"><?= $user['login'] ?></a>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/profile">Мой профиль</a>
                                <a class="dropdown-item" href="#">Мои сообщения</a>
                                <a class="dropdown-item" href="#"> Уведомления </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"> Выйти </a>
                            </div>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container" style="background-color: #ffffff; margin-top: 28px">
        <div class="d-flex">
            <img style="margin-top: 15px; margin-left: 5px; width: 255px; height: 350px" src="<?= $anime['image_url'] ?>" alt="Реинкарнация безработного">
            <div style="position: absolute; margin-top: 360px;margin-left: 5px">
                <div class="card" style="width: 16rem; margin-top: 15px">
                    <div class="card-body" style="text-align: center; align-items: center">
                        <button type="button" class="btn btn-danger mb-2" style="height: 38px; width: 220px; font-size: 15px">Смотреть онлайн</button>
                        <button type="button" class="btn btn-warning mb-2" style="height: 38px; width: 220px"><p style="color: white">Написать отзыв</p></button>
                        <div class="" id="test">
                            <div class="addFavorite">
                                <? if(isset($valFavor['already_add'])):?>
                                    <div class="addFavorite2">
                                        <button type="submit" class="btn btn-info mb-2" name="add" id="add1" style="height: 38px; width: 220px; font-size: 12px">+Добавлено в список</button>
                                    </div>
                                <? elseif ($_COOKIE['user']) :?>
                                        <button type="submit" class="btn btn-success mb-2 otpravka" name="favorites_submit" id="add" style="height: 38px; width: 220px; font-size: 12px">+Добавить в список</button>
                                <? else:?>
                                    <button type="submit" class="btn btn-success mb-2" style="height: 38px; width: 220px; font-size: 12px">+Добавить в список</button>
                                <? endif;?>
                            </div>
                        </div>
                        <br>
                        <a href="#" style="color: #000000; text-decoration: none">В списках у людей</a> <br>
                        <a href="#" style="color: #e30002; text-decoration: none">Читать все рецензии</a>
                    </div>
                </div>
            </div>
            <div class="" style="margin-top: 15px; margin-left: 15px">
                <span class="badge rounded-pill bg-primary" style="width: 125px;height: 35px; margin-bottom: 5px"><p style="margin-top: 7px">Рейитинг: <?= $anime['rating'] ?> / 10</p></span>
                <div style="width: 800px">
                    <h1><?= $anime['title']?></h1>
                </div>
                <hr style="width: 1005px">
                <div class="d-flex">
                    <p>Следующий эпизод</p> <p style="margin-left: 144px">24 окт. 2021 вс 18:00 ожидается выход 4 серии</p>
                </div>
                <hr style="width: 1005px; margin-top: 2px">
                <div class="d-flex">
                    <div class="">
                        <p style="margin-bottom: 2px">Тип</p>
                        <p style="margin-bottom: 2px">Эпизоды"</p>
                        <p style="margin-bottom: 2px">Статус</p>
                        <p style="margin-bottom: 2px">Жанр</p>
                        <p style="margin-bottom: 2px">Первоисточник</p>
                        <p style="margin-bottom: 2px">Сезон</p>
                        <p style="margin-bottom: 2px">Выпуск</p>
                        <p style="margin-bottom: 2px">Студия</p>
                        <p style="margin-bottom: 2px">Рейтинг MPAA</p>
                        <p style="margin-bottom: 2px">Возрастные ограничения</p>
                        <p style="margin-bottom: 2px">Длительность</p>
                        <p style="margin-bottom: 2px">Озвучка</p>
                        <p style="margin-bottom: 2px">Снят по ранобэ </p>
                    </div>
                    <div class="" style="margin-left: 150px">
                        <p style="margin-bottom: 2px"><?= $anime['type'] ?></p>
                        <p style="margin-bottom: 2px"><?= $anime['episodes'] ?> / 12</p>
                        <p style="margin-bottom: 2px"><?= $anime['status'] ?></p>
                        <p style="margin-bottom: 2px"><?= $anime['genre'] ?></p>
                        <p style="margin-bottom: 2px"><?= $anime['original_source'] ?></p>
                        <p style="margin-bottom: 2px"><?= $anime['season'] ?></p>
                        <p style="margin-bottom: 2px"><?= $anime['comes_out'] ?></p>
                        <p style="margin-bottom: 2px"><?= $anime['studio'] ?></p>
                        <p style="margin-bottom: 2px"><?= $anime['rating_mpaa'] ?></p>
                        <p style="margin-bottom: 2px"><?= $anime['age_limit'] ?>+</p>
                        <p style="margin-bottom: 2px"><?= $anime['duration'] ?>~мин. серия</p>
                        <p style="margin-bottom: 2px"><?= $anime['voice_project'] ?></p>
                        <p style="margin-bottom: 2px"><?= $anime['filmed_by'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div style="position: relative; margin-top: 100px">
            <p><?= $anime['description'] ?></p>
        </div>
        <br>
        <br>
    </div>
    <div class="animePlayerBg">
        <div style="position: absolute">
            <div class="animeVideo">
                <div class="main-text-player">
                    <div class="d-flex main-text-player">
                        <h2 class="title">Смотреть аниме "<?= $anime['title']?>" онлайн</h2>
                        <h2 class="age-limit"><?= $anime['age_limit']?>+</h2>
                    </div>

                </div>
                <div class="animePlayerVideo" >
                    <div class="">
                        <iframe src="<?= $anime['video_link'] ?>" width="1000" height="540" frameborder="0" AllowFullScreen allow="autoplay *; fullscreen *"></iframe>
                    </div>
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <div class="btn-search-player">
                            <p>Серия №</p>
                        </div>
                        <div class="btn-player">
                            <a type="button" class="btn btn-outline-primary btn-player-control">1</a>
                            <a type="button" class="btn btn-outline-primary btn-player-control">2</a>
                            <a type="button" class="btn btn-outline-primary btn-player-control">3</a>
                            <a type="button" class="btn btn-outline-primary btn-player-control">4</a>
                        </div>

                    </div>
                </div>
                <div class="footer-text-player">
                    <p class="text-player-gray">Название:</p>
                    <p class="text-player-gray">Дата выхода:</p>
                    <hr class="line-player-gray">
                    <p class="text-player-gray">Поделится с друзьями: </p>
                    <hr class="line-player-gray">
                </div>
            </div>
        </div>
    </div>
    <div class="container bg-white">
        <h3>Комментарии</h3>
        <div class="<?= empty($user) ? 'd-none' : ''?>">
            <div class="mb-3">
                <label for="comment" class="form-label"></label>
                <? if (isset($comError['is-invalid'])){ ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger" role="alert">
                            Коммент должен содержать хотябы один символ и не превышать 300 символов!
                        </div>
                    </div>
                <?php } ?>
                <textarea class="form-control <?= isset($comError['is-invalid']) ? 'is-invalid' : ''?> bodyComment" name="comment" id="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-danger commentari" name="comment_submit">Отправить</button>
        </div>
        <div class="">
            <?foreach ($comments as $comment):?>
            <div class="d-flex anime-comment" data-id="<?=$comment['id']?>">
                <img  style="margin-top: 10px;width: 60px;height: 60px ;border-radius: 50%" src="<?= $comment['image_profile']?>" alt="avatar">
                <div style="margin-left: 20px; margin-top: 12px">
                    <div class="d-flex">
                        <a href="#" style="color: rgba(245,0,11,0.75); text-decoration: none"><?= $comment['login']?></a>
                        <p style="color: rgba(0,0,0,0.4); font-size: 12px; margin-top: 4px"> • <?= " " . date('H:i', strtotime($comment['created_at']))?></p>
                    </div>
                    <div class="">
                        <div style="margin-top: -10px">
                            <p><?= $comment['comment']?></p>
                            <a href="#" style="color: rgba(0,0,0,0.4); text-decoration: none">ОТВЕТИТЬ</a>
                        </div>
                    </div>
                </div>
            </div>
            <? endforeach;?>
        </div>
    </div>
</div>
<div class="p-3 mb-auto" style="background-color: rgba(20,20,20,0.87)">
    <div class="container">
        <a href="#" class="me-3" style="text-decoration: none; color: #ececec; font-size: 15px" >Соглашение</a>
        <a href="#" style="text-decoration: none; color: #ececec; font-size: 15px" class="me-3">Конфиденциальность</a>
        <a href="#" style="text-decoration: none; color: #ececec; font-size: 15px" class="me-3">Для правообладателей</a>
        <a href="#" style="text-decoration: none; color: #ececec; font-size: 15px; margin-left: 550px" class="">©youwannafilm.com <?= date("Y-m-d") ?></a>
    </div>
</div>
</body>
</html>