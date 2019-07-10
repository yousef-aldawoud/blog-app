<?php
set_include_path("var/www/html/");
require_once 'Middlewares/Middleware.php';
require_once 'Models/User.php';
class AuthMiddleware implements Middleware{
    private $routes = ['/create-post.php'];
    public function allow():bool{
        if(in_array($_SERVER['REQUEST_URI'],$this->routes)){
            return User::check()!==null;
            
        }
        return true;
    }

    public function next(){
        if(!self::allow()){
            header("Location: /");
        }
        
    }
    public function getRoutes(){
        return $this->routes;
    }
}