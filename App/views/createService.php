<?php

use App\views\services\CreateUser;



$create = new CreateUser();

$data = $_POST;
$avatar = $_FILES;

$idUser = $create->createUser($data);
$create->AdminCreateUser($data,$avatar,$idUser);


