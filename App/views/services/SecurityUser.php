<?php

namespace App\views\services;

use Delight\Auth\Auth;
use PDO;
use Tamtamchik\SimpleFlash\Flash;

class SecurityUser
{

    private $pdo,$auth;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->auth = new Auth($this->pdo);
    }

    function EditPassword($data)
    {
        try {
            $this->auth->changePassword($data['OldPassword'], $data['NewPassword']);

            return true;
        }
        catch (\Delight\Auth\NotLoggedInException $e) {
            \flash()->error('Not logged in');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            \flash()->error('Invalid password(s)');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            \flash()->error('Too many requests');
            header('Location: /security/'.$data["id"]);
            die();
        }
    }

    function EditEmil($data)
    {
        try {
            if ($this->auth->reconfirmPassword($data['OldPassword'])) {
                $this->auth->changeEmail($data['email'], function ($selector, $token) {
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
            }
            return true;
        }

        catch (\Delight\Auth\InvalidEmailException $e) {
            \flash()->error('Invalid email address');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            \flash()->error('Email address already exists');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            \flash()->error('Account not verified');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\NotLoggedInException $e) {
            \flash()->error('Not logged in');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            \flash()->error('Too many requests');
            header('Location: /security/'.$data["id"]);
            die();
        }
    }

    function SecurityEdit($data)
    {
        try {
            $this->auth->changePassword($data['OldPassword'], $data['NewPassword']);

            if ($this->auth->reconfirmPassword($data['OldPassword'])) {
                $this->auth->changeEmail($data['email'], function ($selector, $token) {
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
            }
            header('Location: /users');
        }
        catch (\Delight\Auth\NotLoggedInException $e) {
            \flash()->error('Not logged in');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            \flash()->error('Invalid password(s)');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            \flash()->error('Too many requests');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            \flash()->error('Invalid email address');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            \flash()->error('Email address already exists');
            header('Location: /security/'.$data["id"]);
            die();
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            \flash()->error('Account not verified');
            header('Location: /security/'.$data["id"]);
            die();
        }
    }

}