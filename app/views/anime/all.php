<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>You Wanna FilM?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}" defer></script>
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
        <div>
            <h1>Список аниме</h1><br>
            <p>Возможно, многие удивятся, узнав, что термин «аниме» родом вовсе не из Страны восходящего солнца, а из Англии. Ёмкое слово animation немного сократили и присвоили по-настоящему магическому искусству японской мультипликации. Аниме мультфильмы онлайн, в отличии от мультфильмов других стран, занимает другую нишу так как он предназначен в основном на подростковую и взрослую аудиторию. Именно эта многогранность обеспечила ей широчайшую востребованность. Для этого направления характерна уникальная отрисовка персонажей и фон, которая легко узнаётся. Большинство из них основаны на манге, а также виртуальных играх и ранобэ. Когда авторы проектов создают свои творения, они стараются придать графике «первородный» стиль, то есть сохранить непередаваемую графику оригинала. Наш портал предоставляет зрителям список аниме онлайн лучших произведений. Это направление кинематографа можно разбить на четыре части. Первая создаётся только для молодых женщин, вторая для более зрелых представительниц прекрасного пола, третья для неопытных юношей, а четвертая для взрослых мужчин. Дети получают специализированные аниме мультики — комодо.</p>
        </div>
        <hr>
        Сортировать по:
        <hr>
        <div>
            <? foreach ($animes as $anime): ?>
                <div class="me-3" style="width: 100%; margin-top: 25px; display: flex">
                    <div class="anime-img">
                        <div class="anime-image">
                            <span class="badge rounded-pill bg-primary mt-3" style="position: absolute">Рейтинг: <?= $anime['rating'] ?> / 10</span>
                            <a href="/anime/<?= $anime['id']?>"><img width="2px" src="<?= $anime['image_url']?>" class="card-img-top" alt="Anime" style="width:155px;height: 217px"></a>
                        </div>
                    </div>
                    <div class="anime-desc" style="margin-left: 20px">
                        <a href="/anime/<?= $anime['id']?>"
                           style="text-decoration: none; color: rgba(227,0,2,0.82); font-size: 22px;"><?= $anime['title']?></a><br>
                        <a href="#"
                           style="text-decoration: none; color: rgba(0,0,0,0.75); font-size: 16px;margin-bottom: 20px!important;"><?= $anime["season"] . " " . "/" . " " . $anime['genre']?></a>
                        <p style="text-decoration: none; color: rgba(0,0,0,0.75); font-size: 16px;margin-top: 10px!important;"><?= mb_strimwidth($desc = $anime['description'], 0, 300, "...")?></p>
                    </div>
                </div>
            <? endforeach; ?>
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
</div>
</body>
</html>