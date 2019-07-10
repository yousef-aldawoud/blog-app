<?

set_include_path("var/www/html/");
require_once 'Middlewares/GuestMiddleware.php';
require_once 'Middlewares/AuthMiddleware.php';
require_once 'Middlewares/ModifyPostMiddleware.php';

$guestMiddleware = new GuestMiddleware();
$guestMiddleware->next();

$authMiddleware = new AuthMiddleware();
$authMiddleware->next();


$modifyPostMiddleware = new ModifyPostMiddleware();
$modifyPostMiddleware->next();