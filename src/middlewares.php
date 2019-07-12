<?php

set_include_path(getenv("INCLUDE_PATH"));
require_once 'Middlewares/GuestMiddleware.php';
require_once 'Middlewares/AuthMiddleware.php';
require_once 'Middlewares/ModifyPostMiddleware.php';

$guestMiddleware = new GuestMiddleware();
$guestMiddleware->next();

$authMiddleware = new AuthMiddleware();
$authMiddleware->next();


$modifyPostMiddleware = new ModifyPostMiddleware();
$modifyPostMiddleware->next();