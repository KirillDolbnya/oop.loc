<?php

namespace App\views\services;

use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use PDO;
use Tamtamchik\SimpleFlash\Flash;

class CreateUser
{


    private $pdo, $auth,$queryFactory;


    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=oop_register;", "root", "");
        $this->auth = new Auth($this->pdo);
        $this->queryFactory = new QueryFactory('mysql');
    }


    public function AdminCreateUser($data,$avatar,$idUser)
    {
        $result = pathinfo($avatar['avatar']['name']);
        $filename = uniqid() . '.' . $result['extension'];
        $profileImage = move_uploaded_file($avatar['avatar']['tmp_name'], 'App/views/assets/img/upload/'.$filename);

        $update = $this->queryFactory->newUpdate();

        $update
            ->table('users')                   // INTO this table
            ->cols([                        // bind values as "(col) VALUES (:col)"
                'state'=>$data['state'],
                'image' => $filename,
                'address' => $data['address'],
                'work' => $data['work'],
                'tel' => $data['tel'],
                'vk' => $data['vk'],
                'telegramm' => $data['telegramm'],
                'instagram' => $data['instagram'],

            ])
            ->where('id = :id')
            ->bindValue('id' , $idUser);

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());

        return true;
    }

    public function createUser($data)
    {
        try {
            $userId = $this->auth->admin()->createUser($data['email'], $data['password'], $data['username']);

            return $userId;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
    }
}