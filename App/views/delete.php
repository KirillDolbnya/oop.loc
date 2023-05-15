<?php

use App\views\services\CheckLogin;
use App\views\services\CheckingRoles;
use App\views\services\DeleteUser;



$checkLogin = new CheckLogin();
$checkLogin->checkLogin();

$checkRole = new CheckingRoles();

$deleteUser = new DeleteUser();

$idUser = $GLOBALS['vars']['id'];
$idUser = (int)$idUser;

if ($_SESSION['auth_user_id'] !== $idUser && !$checkRole->checkrole($_SESSION['auth_user_id'])){
    \flash()->error('Можно редактировать только свой профиль');
    header('Location: /users');
    die();
}

if ($checkRole->checkrole($_SESSION['auth_user_id'])){
    $deleteUser->DeleteUserByAdmin($idUser);
}else{
    $deleteUser->DeleteUserByUser($idUser);
}
