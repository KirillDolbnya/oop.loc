<?php

use App\views\services\EditStatus;

$editStatus = new EditStatus();

$data = $_POST;

$editStatus->editStatusbyUser($data);