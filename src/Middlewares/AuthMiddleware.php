<?php
set_include_path(getenv("INCLUDE_PATH"));
require_once 'Middlewares/Middleware.php';
require_once 'Models/User.php';
class AuthMiddleware implements Middleware{
    private $routes = ['/create-post.php',"/update-post.php","/comments.php"];
    public function allow():bool{
        if(in_array(explode ("?",$_SERVER['REQUEST_URI'])[0] ,$this->routes)){
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