<?php


use App\views\services\registration;

$querybuilder = new registration();

//var_dump($_POST);die();

$querybuilder->registration($_POST);

header('Location: /');

