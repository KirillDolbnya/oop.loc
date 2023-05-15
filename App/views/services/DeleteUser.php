<?php

namespace App\views\services;

use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use PDO;
use Tamtamchik\SimpleFlash\Flash;

class DeleteUser
{

    private $pdo,$auth,$queryFactory;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->auth = new Auth($this->pdo);
        $this->queryFactory = new QueryFactory('mysql');
    }


    function DeleteUserByAdmin($userID)
    {
        try {
            $this->auth->admin()->deleteUserById($userID);
            \flash()->info('User deleted under id '.$userID);
            header('Location: /users');
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            \flash()->error('Unknown ID');
            header('Location: /users');
            die();
        }
    }

    function DeleteUserByUser($userID)
    {
        $delete = $this->queryFactory->newDelete();

        $delete
            ->from('users')
            ->where('id = :id')
            ->bindValue('id', $userID);

        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
        \flash()->info('Профиль удален');
        header('Location: /registration');
        die();
    }
}