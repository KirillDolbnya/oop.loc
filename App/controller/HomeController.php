<?php

namespace App\controller;
use League\Plates\Engine;

class HomeController{

    private $templates;
    public function __construct()
    {
        $this->templates = new Engine('App/views');
    }

    public function registration($vars = null)
    {
        echo $this->templates->render('page_register');
    }

    public function registerService($vars = null)
    {
        echo $this->templates->render('registerService');
    }

    public function login($vars = null)
    {
        echo $this->templates->render('page_login');
    }
    public function singIn($vars = null)
    {
        echo $this->templates->render('loginService');
    }
    public function users($vars = null)
    {
        echo $this->templates->render('users');
    }
}