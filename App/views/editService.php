<?php

use App\views\services\EditUsers;


$edit = new EditUsers();

$data = $_POST;

$edit->edit($data);
