<?php

namespace App\views\services;

use Aura\SqlQuery\QueryFactory;
use PDO;
use Tamtamchik\SimpleFlash\Flash;

class EditAvatar
{

    private $pdo,$queryFactory;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->queryFactory = new QueryFactory('mysql');
    }

    public function avatar($image,$id)
    {
        $result = pathinfo($image['image']['name']);
        $filename = uniqid() . '.' . $result['extension'];
        $profileImage = move_uploaded_file($image['image']['tmp_name'], 'App/views/assets/img/upload/'.$filename);


        $update = $this->queryFactory->newUpdate();

        $update
            ->table('users')
            ->cols([
                'image' => $filename,
            ])
            ->where('id = :id')           // AND WHERE these conditions
            ->bindValue('id', $id);

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());

//        \flash()->success('Avatar edit');
        header('Location: /users');
    }

}