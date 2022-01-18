<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/public/scripts/register.js"></script>
    <link rel="stylesheet" href="/public/styles/register.css">
</head>
<body>
<div class="bform py-5">
    <!-- Row -->
    <div class="row">
        <div class="container">
            <div class="col-lg-6 align-justify-center pr-4 pl-0 contact-form">
                <div class="">
                    <h2 class="mb-3 font-weight-light">Создать аккаунт</h2>
                    <h6 class="subtitle font-weight-normal">Lorem ipsum dolor sit amet, adipiscing.</h6>
                    <form class="mt-3" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control <?= isset($validate['name']) ? 'is-invalid' : '' ?>"
                                           type="text" name="name" value="<?= isset($validate['name']) ? $_POST['name'] : '' ?>" placeholder="Введит ваше имя">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control <?= isset($validate['login']) ? 'is-invalid' : '' ?>"
                                           type="text" name="login" value="<?= isset($validate['login']) ? $_POST['login'] : '' ?>" placeholder="Введите логин">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input class="form-control <?= isset($validate['email']) ? 'is-invalid' : '' ?>"
                                           type="text" value="<?= isset($validate['email']) ? $_POST['email'] : '' ?>"
                                           name="email" placeholder="Введите email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control <?= isset($validate['password']) ? 'is-invalid' : '' ?>"
                                           type="password" name="password" placeholder="Введите пароль">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="password" name="confirmPassword" placeholder="Подтвердите пароль">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-md btn-block btn-danger-gradiant text-white border-0" name="register_submit"><span> Создать аккаунт </span></button>
                                <!-- -->
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12 text-center mt-4">
                            <h6 class="font-weight-normal">Войти с помощью социальной сети</h6>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <a href="#" class="btn btn-block bg-facebook text-white mt-3">Facebook</a>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <a href="#" class="btn btn-block bg-twitter text-white mt-3">Twitter</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center mt-4">
                            У вас уже есть учетная запись? <a href="/login" class="text-danger">Авторизоваться</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>