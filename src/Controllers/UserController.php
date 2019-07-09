<?
set_include_path("/var/www/html/");

require("Models/User.php");
class UserController{
    public function login(){
        if(empty($_POST['username'])||empty($_POST['password'])){
            $_SESSION['errors']=['Username or password is incorrect'];
            return $_SERVER['HTTP_REFERER'];
        }
        $user=User::authenticate($_POST['username'],$_POST['password']);
        if($user==null){
            $_SESSION['errors']=['Username or password is incorrect'];
            return $_SERVER['HTTP_REFERER'];;
        }
        return "/";

    }
    public function signup(){
        if(empty($_POST['name'])||empty($_POST['username'])||empty($_POST['password'])){
            $_SESSION['errors']=['Name, username, and password mustn\'t be empty'];
            return $_SERVER['HTTP_REFERER'];;
        }
        $user=User::createUser($_POST['username'],$_POST['name'],$_POST['password']);
        if($user==null){
            $_SESSION['errors']=[" The `".$_POST["username"]."` username is used"];
            return $_SERVER['HTTP_REFERER'];;
        }
        $user=User::authenticate($_POST['username'],$_POST['password']);
        return "/";
    }

}