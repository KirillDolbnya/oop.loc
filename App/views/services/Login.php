<?php

namespace App\views\services;

use Delight\Auth\Auth;
use PDO;
use Tamtamchik\SimpleFlash\Flash;

class Login
{
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->auth = new Auth($this->pdo);
    }

    public function login($data){
        try {
            $this->auth->login($data['email'], $data['password']);

            \flash()->success('User is logged in');
            echo 'User is logged in';
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            flash()->error('Wrong email address');
            header('Location: /login');
            die;
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            \flash()->error('Wrong password');
            header('Location: /login');
            die;
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            \flash()->error('Email not verified');
            header('Location: /login');
            die;
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            \flash()->error('Too many requests');
            header('Location: /login');
            die;
        }
    }
}