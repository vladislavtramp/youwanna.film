<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add</title>
    <link href="/public/styles/admin.css" rel="stylesheet">
    <link href="/public/styles/bootstrap.css" rel="stylesheet">
    <link href="/public/styles/font-awesome.css" rel="stylesheet">
    <script src="/public/scripts/bootstrap.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/jquery.js"></script>
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
                            <a class="nav-link active" aria-current="page" href="../../../index.php">Аниме</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Манга</a>
                        </li>
                    </ul>
                    <form class="d-flex me-3">
                        <input class="form-control me-2" type="search" placeholder="Введите аниме" aria-label="Search">
                        <button type="submit" class="btn btn-success">Найти</button>
                    </form>
                    <li class="nav-item">
                        <a href="../../../index.php" class="btn btn-outline-primary me-1">Войти в аккаунт</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../../index.php" class="btn btn-outline-info">Зарегестрироваться</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image: url('/public/images/contact-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Напишите мне</h1>
                        <span class="subheading">я постараюсь ответить в течении 24 часов</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="/contact" method="post">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <p><input type="text" class="form-control" name="name" placeholder="Имя"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <p><input type="text" class="form-control" name="email" placeholder="E-mail"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls">
                            <p><textarea rows="5" class="form-control" name="text" placeholder="Сообщение"></textarea></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary" id="sendMessageButton">Отправить</button>
                    </div>
                </form>
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
</div>
</body>
</html>