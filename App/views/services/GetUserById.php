<?php

namespace App\views\services;

use Aura\SqlQuery\QueryFactory;
use PDO;

class GetUserById
{

    private $pdo,$queryFactory;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->queryFactory = new QueryFactory('mysql');
    }

    function getUserByid($userID)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from('users')
            ->where('id = :id')
            ->bindValue('id', $userID);
        $sql = $select->getStatement();
        $sth = $this->pdo->prepare($sql);
        $sth->execute($select->getBindValues());
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}