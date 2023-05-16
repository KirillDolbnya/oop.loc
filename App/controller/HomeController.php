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

    public function logout($vars = null)
    {
        echo $this->templates->render('logoutService');
    }

    public function create($vars = null)
    {
        echo $this->templates->render('create_user');
    }

    public function createService($vars = null)
    {
        echo $this->templates->render('createService');
    }

    public function edit($vars = null)
    {
        echo $this->templates->render('edit');
    }

    public function editService($vars = null)
    {
        echo $this->templates->render('editService');
    }

    public function security($vars = null)
    {
        echo $this->templates->render('security');
    }

    public function securityService($vars = null)
    {
        echo $this->templates->render('securityService');
    }

    public function delete($vars = null)
    {
        echo $this->templates->render('delete');
    }

    public function profile($vars = null)
    {
        echo $this->templates->render('page_profile');
    }

    public function status($vars = null)
    {
        echo $this->templates->render('status');
    }

    public function statusService($vars = null)
    {
        echo $this->templates->render('statusService');
    }

    public function media($vars = null)
    {
        echo $this->templates->render('media');
    }

    public function mediaService($vars = null)
    {
        echo $this->templates->render('mediaService');
    }

    }