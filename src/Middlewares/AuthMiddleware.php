<?php
set_include_path("var/www/html/");
require_once 'Middlewares/Middleware.php';
require_once 'Models/User.php';
class AuthMiddleware implements Middleware{
    private $routes = [];
    public function allow():bool{
        return User::check()!==null;
    }

    public function next(){
        if(self::allow()){
            redirect("Location: /");
        }
        
    }
    public function getRoutes(){
        return $this->routes;
    }
}