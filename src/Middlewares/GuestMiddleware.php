<?php
set_include_path("/var/www/html/");
require_once 'Middlewares/Middleware.php';
require_once 'Models/User.php';
class GuestMiddleware implements Middleware{
    private $routes = ["/signup.php","/login.php"];
    public function allow():bool{
        if(in_array($_SERVER['REQUEST_URI'],$this->routes)){
            return User::check()===null;
            die($_SERVER['REQUEST_URI']);
        }
        return false;
    }

    public function next(){
        if(!$this->allow()){
            header("Location: /");
        }
        
        
    }
    public function getRoutes(){
        return $this->routes;
    }
}