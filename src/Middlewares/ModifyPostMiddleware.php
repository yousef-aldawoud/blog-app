<?php
set_include_path(getenv("INCLUDE_PATH"));
require_once 'Middlewares/Middleware.php';
require_once 'Models/User.php';
require_once 'Models/Post.php';
class ModifyPostMiddleware implements Middleware{
    private $routes = ["/update-post.php"];
    public function allow():bool{
        if(in_array(explode ("?",$_SERVER['REQUEST_URI'])[0] ,$this->routes)){
            if(Post::find($_GET['post_id'])===null){
                return true;
            }
            return User::check()->id==Post::find($_GET['post_id'])->user_id;
            
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