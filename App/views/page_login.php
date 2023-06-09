<?php
if( !session_id() ) {
    session_start();
}

$this->layout('template',['title' => 'Войти','link'=>'App/views/assets/css/page-login-alt.css']);

?>
    <div class="blankpage-form-field">
        <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                <img src="/App/views/assets/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
                <span class="page-logo-text mr-1">Учебный проект</span>
                <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
            </a>
        </div>
        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
            <div class="">
                <?php echo flash()->display(); ?>
            </div>
            <form action="/loginService" method="post">
                <div class="form-group">
                    <label class="form-label" for="username">Email</label>
                    <input name="email" type="email" id="username" class="form-control" placeholder="Эл. адрес" value="">
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Пароль</label>
                    <input name="password" type="password" id="password" class="form-control" placeholder="" >
                </div>
                <button type="submit" class="btn btn-default float-right">Войти</button>
                <a href="/verification">
                    <button class="btn btn-default float-left">Email verification</button>
                </a>
            </form>
        </div>
        <div class="blankpage-footer text-center">
            Нет аккаунта? <a href="/registration"><strong>Зарегистрироваться</strong></a>
        </div>
    </div>
    <video poster="/App/views/assets/img/backgrounds/clouds.png" id="bgvid" playsinline autoplay muted loop>
        <source src="/App/views/assets/media/video/cc.webm" type="video/webm">
        <source src="/App/views/assets/media/video/cc.mp4" type="video/mp4">
    </video>
    <script src="/App/views/assets/js/vendors.bundle.js"></script>
