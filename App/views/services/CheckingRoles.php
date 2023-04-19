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

    public function checkrole($userId){
        try {
            if ($this->auth->admin()->doesUserHaveRole($userId, \Delight\Auth\Role::ADMIN)) {
               return true;
            }
            else {
                return false;
            }
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            die('Unknown user ID');
        }
    }
}