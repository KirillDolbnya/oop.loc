<?php

if( !session_id() ) {
    session_start();
}


$this->layout('template',['title' => 'Edit']);

use App\views\services\CheckLogin;
use Tamtamchik\SimpleFlash\Flash;
use App\views\services\CheckingRoles;

$checkLogin = new CheckLogin();
$checkLogin->checkLogin();

$idUser = $GLOBALS['vars']['id'];
$idUser = (int)$idUser;

$checkLogin = new CheckLogin();
$checkLogin->checkLogin();
$checkRole = new CheckingRoles();

if ($_SESSION['auth_user_id'] !== $idUser && !$checkRole->checkrole($_SESSION['auth_user_id'])){
    \flash()->error('Можно редактировать только свой профиль');
    header('Location: /users');
    die();
}

?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-primary-gradient">
        <a class="navbar-brand d-flex align-items-center fw-500" href="/users"><img alt="logo" class="d-inline-block align-top mr-2" src="/App/views/assets/img/logo.png"> Учебный проект</a> <button aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarColor02" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/login">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Выйти</a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="js-page-content" role="main" class="page-content mt-3">
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-plus-circle'></i> Редактировать
            </h1>
            <div>
                <?php echo flash()->display(); ?>
            </div>
        </div>
        <form action="/editService" method="post">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-container">
                            <div class="panel-hdr">
                                <h2>Общая информация</h2>
                            </div>
                            <div class="panel-content">
                                <!-- username -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Имя</label>
                                    <input name="username" type="text" id="simpleinput" class="form-control" >
                                </div>

                                <!-- title -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Место работы</label>
                                    <input name="work" type="text" id="simpleinput" class="form-control">
                                </div>

                                <!-- tel -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Номер телефона</label>
                                    <input name="tel" type="number" id="simpleinput" class="form-control">
                                </div>

                                <!-- address -->
                                <div class="form-group">
                                    <label class="form-label" for="simpleinput">Адрес</label>
                                    <input name="address" type="text" id="simpleinput" class="form-control">
                                </div>
                                <input type="hidden" name="id" value="<?php echo $idUser ?>">
                                <div class="col-md-12 mt-3 d-flex flex-row-reverse">
                                    <button type="submit" class="btn btn-warning">Редактировать</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
