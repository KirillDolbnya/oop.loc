<?php

namespace App\views\services;

use Delight\Auth\Auth;
use PDO;
use Tamtamchik\SimpleFlash\Flash;

class registration{


    private $pdo,$auth;


    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->auth = new Auth($this->pdo);
    }

    public function registration($data){
        try {
            $userId = $this->auth->register($data['email'], $data['password']);

            flash()->success(['We have signed up a new user with the ID ' . $userId]);
//            header('Location: /register');
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error(['Invalid email address']);
            header('Location: /register');
            die();
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            flash()->error(['Invalid password']);
            header('Location: /register');
            die();
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            flash()->error(['User already exists']);
            header('Location: /register');
            die();
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            flash()->error(['Too many requests']);
            header('Location: /register');
            die();
        }
    }


}