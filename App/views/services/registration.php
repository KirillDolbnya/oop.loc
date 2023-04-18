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
                try {
                    $this->auth->confirmEmail($selector, $token);
                    \flash()->info('Email address has been verified');

                }
                catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
                    \flash()->error('Invalid token');
                    die();
                }
                catch (\Delight\Auth\TokenExpiredException $e) {
                    \flash()->error('Token expired');
                    die();
                }
                catch (\Delight\Auth\UserAlreadyExistsException $e) {
                    \flash()->error('Email address already exists');
                    die();
                }
                catch (\Delight\Auth\TooManyRequestsException $e) {
                    \flash()->error('Too many requests');
                    die();
                }
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