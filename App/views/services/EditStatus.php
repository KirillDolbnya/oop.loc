<?php

namespace App\views\services;

use Aura\SqlQuery\QueryFactory;
use PDO;
use Tamtamchik\SimpleFlash\Flash;

class EditStatus
{

    private $pdo,$queryFactory;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->queryFactory = new QueryFactory('mysql');
    }

    public function editStatusbyUser($data)
    {
        $update = $this->queryFactory->newUpdate();

        $update
            ->table('users')
            ->cols($data)
            ->where('id = :id')
            ->bindValue('id', $data['id']);

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());

//        \flash()->success('Status Edit :)');
        header('Location: /users');
        die();
    }

}