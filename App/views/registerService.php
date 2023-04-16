<?php


use App\views\services\Registration;

$querybuilder = new Registration();

//var_dump($_POST['email']);die();
//$email = $_POST['email'];
//$password = $_POST['password']
//var_dump($email,$password);die;
$data = $_POST;

$querybuilder->registration($data);


