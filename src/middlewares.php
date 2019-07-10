<?

set_include_path("var/www/html/");
require_once 'Middlewares/GuestMiddleware.php';
require_once 'Middlewares/AuthMiddleware.php';
$guestMiddleware = new GuestMiddleware();
$guestMiddleware->next();

$authMiddleware = new AuthMiddleware();
$authMiddleware->next();