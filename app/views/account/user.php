<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>You Wanna FilM?</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/public/scripts/bootstrap.js"></script>
    <script src="/public/scripts/popper.js"></script>
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
                            <a href="#" style="text-decoration: none; color: white;"><?= $user['login'] ?></a>
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
    <div class="container" style="background-color: #ececec">
        <div class="d-flex" style="margin-top: 20px">
            <div style="width: 960px; max-height: auto; background-color: white; margin-bottom: 50px">
                <img style="position: absolute;margin-left: 40px ;margin-top: 220px ;width: 160px;height: 160px ;border-radius: 50%" src="<?= $userProfile['image_profile']?>" alt="avatar">
                <div class="mb-3" style="background: #343434; width: 960px; height: 400px">
                        <? if (isset($valFriend['yourFriend']) && $valFriend['yourFriend'] === true): ?>
                            <button class="btn btn-outline-secondary" style="margin-top: 350px; margin-left: 750px" name="add_friend_submit">В друзьях</button>
                        <? elseif (isset($valFriend['userFollow']) && $valFriend['userFollow'] === true): ?>
                            <button class="btn btn-outline-primary" style="margin-top: 350px; margin-left: 750px" name="add_friend_submit">Вы подписаны</button>
                        <? elseif (isset($valFriend['yourFollow']) && $valFriend['yourFollow'] === true): ?>
                            <button class="btn btn-outline-warning" style="margin-top: 350px; margin-left: 750px" name="add_friend_submit">Подписан на вас</button>
                        <? elseif ($user['id'] === $userProfile['id']): ?>
                            <button class="btn btn-outline-warning" style="margin-top: 350px; margin-left: 750px" name="add_friend_submit">Это ваш профиль</button>
                        <? else: ?>
                    <form action="#" method="post">
                        <button type="submit" class="btn btn-success" style="margin-top: 350px; margin-left: 750px" name="add_friend_submit">Добавить в друзья</button>
                    </form>
                    <? endif;?>
                </div>
                <div class="">
                    <div class="" style="align-content: center; text-align: center">
                        <h1><?= $userProfile['login']?></h1>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer">Ваш возраст:<cite title="Source Title"> <?= $userProfile['age']?></cite></footer>
                            <footer class="blockquote-footer">Расскажите о ваших увлечениях:<cite title="Source Title"> <?= $userProfile['about_user']?></cite></footer>

                            <? if ($userProfile['user_group'] === 2): ?>
                                <footer class="blockquote-footer">Данный пользователь является Главным Администратором онлайн кинотеатра</footer>
                            <? else: ?>
                                <footer class="blockquote-footer">Данный пользователь является Гостем онлайн кинотеатра</footer>
                            <? endif; ?>
                        </blockquote>
                    </div>
                </div>
            </div>
            <ul id="1613" class="list-group" style="margin-left: 70px; width: 600px; height: 600px">
                <li id="crue" class="list-group-item"><h5>Меню</h5></li>
                <a href="#" style="text-decoration: none"> <li class="list-group-item">Главная</li> </a>
                <a href="#" style="text-decoration: none"> <li class="list-group-item">Сообщения</li> </a>
                <a href="#" style="text-decoration: none"> <li class="list-group-item">Друзья</li> </a>
                <a href="profile/mylist/anime" style="text-decoration: none"> <li class="list-group-item">Список аниме</li> </a>
                <a href="#" style="text-decoration: none"> <li class="list-group-item">Список манги</li> </a>
                <a href="#" style="text-decoration: none"> <li class="list-group-item">Мои Рецензии</li> </a>
                <a href="#" style="text-decoration: none"> <li class="list-group-item">Настройки</li> </a>
            </ul>
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