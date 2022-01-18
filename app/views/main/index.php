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
    <script src="/public/scripts/index.js"></script>
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
                            <a class="nav-link active navtitle" aria-current="page" href="/anime/all">Аниме</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active navtitle" href="#">Манга</a>
                        </li>
                    </ul>
                    <form class="d-flex me-3" action="anime/search" method="post">
                        <input class="form-control me-2" type="search" name="text" placeholder="Введите аниме" aria-label="Search">
                        <button type="submit" class="btn btn-success" name="find_submit">Найти</button>
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
    <div class="p-3 mb-2" style="background-color: rgba(175,175,175,0.3)">
        <div class="container">

            <a href="#" class="me-3 header-title" style="text-decoration: none; color: #1a202c; font-size: 15px" >Онгоинги</a>
            <a href="#" style="text-decoration: none; color: #1a202c; font-size: 15px" class="me-3 header-title">Аниме 2021</a>
            <a href="#" style="text-decoration: none; color: #1a202c; font-size: 15px" class="me-3 header-title">Аниме 2020</a>

        </div>
    </div>
    <div class="container">
        <h1>YouWannaFilm — смотреть аниме онлайн бесплатно</h1>
        <p>Вот уже много лет японская анимация пользуется огромным успехом по всему миру, включая Россию. Эти ленты любят за яркий сюжет, оригинальную рисовку и неизменный накал эмоций.<br>
            <br>

            Многие поклонники любят смотреть аниме онлайн, однако для этого часто приходится пользоваться несколькими источниками, поскольку ни один из них нельзя назвать универсальным. Но у нас есть отличная новость для любителей аниме! Мы запустили новый проект YouWannaFilm, посвящённый онлайн-просмотру аниме. Теперь Вам не придётся бороздить просторы интернета в поисках любимого тайтла – все лучшие аниме в хорошем качестве уже есть на нашем портале. Мы сами очень любим этот жанр и поэтому постарались сделать наш сайт как можно более удобным и захватывающим.</p>
    </div>
    <div class="p-3 mb-2 contDecor" style="background-color: rgba(175,175,175,0.3)">
        <div class="container mt-3" >
            <a href="#" class="nar decord" style="color: #090909; text-decoration: none">
                <h2 class="decord">Аниме осеннего сезона</h2>
            </a>
            <div style="display: flex">
               <? foreach ($mainAnimes as $key): ?>
                <div class="me-3" style="width: 155px">
                    <p><span class="badge rounded-pill bg-primary mt-3" style="position: absolute">Рейтинг: <?= $key['rating'] ?> / 10</span>
                        <a href="/anime/<?= $key['id'] ?>"><img width="2px" src="<?= $key['image_url'] ?>" class="card-img-top" alt="Anime"></a>
                        <a href="/anime/<?= $key['id'] ?>" class="under-line-season-title" style="text-decoration: none; color: rgba(227,0,2,0.82); font-size: 22px"><?= mb_strimwidth($key['title'], 0, 14, "...")?></a>
                </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
    <div class="container">
        <h2> Наши преимущества</h2>
        <p> Мы подготовили для Вас следующие бонусы: </p>
        <ul>
            <li>Огромный выбор аниме мультики онлайн. У нас загружены все популярные и качественные аниме прошлых лет, и наша коллекция регулярно пополняется самыми последними новинками. В каталоге есть как полнометражные, так и аниме сериалы, а жанровое разнообразие во многом превосходит другие аналогичные порталы. У нас Вы сможете посмотреть красивые произведения о любви и дружбе, вере и предательстве, доброте и корысти, и многое другое.</li> <br>
            <li> Превосходное качество. Все файлы предоставляются в HD-формате, что позволяет смотреть аниме онлайн в хорошем качестве не только на персональном компьютере, но и на телевизоре. Благодаря грамотному использованию IT-технологий мы гарантируем Вам комфортный бесперебойный просмотр любого аниме, максимально имитирующий поход в настоящий кинотеатр. При этом Вы сможете в любой момент поставить на паузу или перемотать его до нужного момента.</li> <br>
            <li>Удобная навигация. Сайт YouWannaFilm – это не просто хранилище аниме онлайн, а структурированная фильмотека, в которой очень легко ориентироваться. Все файлы отсортированы по жанру, длительности, компании-создателю и другим параметрам. Вы всегда сможете в считанные минуты найти именно ту ленту, которую ищете.</li> <br>
            <li>Минимум рекламы. Как и большинство других сайтов, мы пользуемся рекламой, но в то же время мы позаботились о том, чтобы рекламные объявления не мешали вашему просмотру. Ненавязчивая и дозированная реклама – это одно из преимуществ портала YouWannaFilm, которое уже оценили тысячи зрителей.</li>
        </ul>
        <p>А ещё мы рады предложить Вам приятный дизайн сайта, быструю работу всех разделов и удобный доступ с различных устройств. Смотреть аниме онлайн теперь стало ещё приятнее и комфортнее!</p>
        <h2>На YouWannaFilm – только бесплатные аниме без регистрации</h2>
        Самый главный плюс нашего портала – это возможность смотреть все аниме абсолютно бесплатно. Мы считаем, что искусство японской мультипликации должно быть доступно каждому, тем более что большинство наших зрителей – представители молодёжи. Плата не взимается ни на каком этапе пользования сайтом, что делает наш проект по-настоящему удобным для каждого.<br>

        Кроме того, пользование сайтом YouWannaFilm не требует регистрации. Пользователи могут смотреть аниме онлайн бесплатно сразу же после захода на сайт.<br>

        Если Вы любите японскую мультипликацию, заходите на YouWannaFilm. Мы обещаем Вам настоящее удовольствие от просмотра лучших аниме!</p><br>
    </div>
    <div class="p-3 mb-auto" style="background-color: rgba(20,20,20,0.87)">
        <div class="container">
            <a href="#" class="me-3 footer-text" style="text-decoration: none; color: rgba(236,236,236,0.55); font-size: 15px" >Соглашение</a>
            <a href="#" style="text-decoration: none; color: rgba(236,236,236,0.55); font-size: 15px" class="me-3 footer-text">Конфиденциальность</a>
            <a href="#" style="text-decoration: none; color: rgba(236,236,236,0.55); font-size: 15px" class="me-3 footer-text">Для правообладателей</a>
            <a href="#" style="text-decoration: none; color: rgba(236,236,236,0.55); font-size: 15px; margin-left: 550px" class="">©youwannafilm.com <?= date("Y-m-d") ?></a>
        </div>
    </div>
</div>
</body>
</html>