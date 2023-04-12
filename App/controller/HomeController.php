<?php

namespace App\controller;
use League\Plates\Engine;

class HomeController{

    private $templates;
    public function __construct()
    {
        $this->templates = new Engine('App/views');
    }

    public function register($vars = null)
    {
        echo $this->templates->render('page_register');
    }
}