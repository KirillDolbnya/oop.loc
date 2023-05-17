<?php

use App\views\services\SecurityUser;


$querybuilder = new SecurityUser();

$data = $_POST;


if ($_POST['NewPassword'] !== $_POST['NewAgainPassword']){
    \flash()->error('пароли не совпадают');
    header('Location: /security/'.$data["id"]);
    die();
}


if ($querybuilder->EditEmil($data) === true ){
    if ($querybuilder->EditPassword($data) === true){
        header('Location: /users');
    }
}

//$querybuilder->EditPassword($data);
//
//$querybuilder->EditEmil($data);
//
//if ($querybuilder->EditEmil($data) === true && $querybuilder->EditPassword($data) === true ){
//    \flash()->success('email and password edit :)');
//    header('Location: /users');
//    die();
//}