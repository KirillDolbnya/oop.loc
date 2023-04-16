<?php

namespace App\views\services;

use Delight\Auth\Auth;
use PDO;
use Tamtamchik\SimpleFlash\Flash;

class Registration
{


    private $pdo, $auth;


    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->auth = new Auth($this->pdo);
    }

    public function registration($data)
    {
//        var_dump($data['email'],$data['password']);die();
        try {
            $userId = $this->auth->register($data['email'], $data['password'],null, function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
                echo '  For SMS, consider using a third-party service and a compatible SDK';
            });

            \flash()->success('We have signed up a new user with the ID ' . $userId);
            header('Location: /login');

        } catch (\Delight\Auth\InvalidEmailException $e) {
            \flash()->error('Invalid email address');
            header('Location: /registration');
            die();
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            \flash()->error('Invalid password');
            header('Location: /registration');
            die();
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            \flash()->error('User already exists');
            header('Location: /registration');
            die();
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            \flash()->error('Too many requests');
            header('Location: /registration');
            die();
        }
    }
}