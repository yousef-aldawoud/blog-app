<?

set_include_path("var/www/html/");
require_once 'Middlewares/GuestMiddleware.php';
$guestMiddleware = new GuestMiddleware();
$guestMiddleware->next();