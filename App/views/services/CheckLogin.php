<?php

namespace App\views\services;

use Delight\Auth\Auth;
use Tamtamchik\SimpleFlash\Flash;
use PDO;

class CheckLogin
{

    private $pdo, $auth;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->auth = new Auth($this->pdo);
    }

    public function checkLogin(){
        if($this->auth->isLoggedIn()) {
            return true;
        }
        else {
            \flash()->info('Войдите в профиль');
            header('Location: /login');
            die();
        }
    }
}