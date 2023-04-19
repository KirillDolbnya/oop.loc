<?php

use App\views\services\Logout;

$logout = new Logout();

$logout->logout();
header('Location: /login');