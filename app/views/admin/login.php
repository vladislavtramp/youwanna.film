!<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link href="/public/styles/admin.css" rel="stylesheet">
    <link href="/public/styles/bootstrap.css" rel="stylesheet">
    <link href="/public/styles/font-awesome.css" rel="stylesheet">
    <script src="/public/scripts/bootstrap.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/popper.js"></script>
</head>
<body>
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Вход в панель Администратора</div>
        <form action="/admin/login/" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="login">Логин</label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Вход</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
