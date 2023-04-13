<?php


use App\views\services\Registration;

$querybuilder = new Registration();

//var_dump($_POST);die();

$querybuilder->registration($_POST);


