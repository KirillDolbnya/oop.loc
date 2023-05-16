<?php

use App\views\services\EditAvatar;


$id = $_POST['id'];

$image = $_FILES;


$querybuldier = new EditAvatar();

$querybuldier->avatar($image,$id);