<?php

namespace App\views\services;

use Delight\Auth\Auth;
use PDO;

class CheckingRoles
{

    private $pdo, $auth;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->auth = new Auth($this->pdo);
    }

    function canEditArticle(\Delight\Auth\Auth $user) {
        return $user->hasAnyRole(
            \Delight\Auth\Role::ADMIN,
        );
    }
}