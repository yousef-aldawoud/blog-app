<?php
set_include_path("/var/www/html/");
require_once 'Middlewares/Middleware.php';
require_once 'Models/User.php';
class GuestMiddleware implements Middleware{
    private $routes = ["/signup.php","/login.php"];
    public function allow():bool{
        if(in_array(explode ("?",$_SERVER['REQUEST_URI'])[0],$this->routes)){
            return User::check()===null;
            
        }
        return true;
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