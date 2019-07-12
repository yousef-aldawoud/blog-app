<?
set_include_path(getenv("INCLUDE_PATH"));

require_once("Models/User.php");
class UserController{
    public function login(){
        if(empty($_POST['username'])||empty($_POST['password'])){
            $_SESSION['errors']=['Username or password is incorrect'];
            return $_SERVER['HTTP_REFERER'];
        }
        $user=User::authenticate($_POST['username'],$_POST['password']);
        if($user===null){
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

    public function logout(){
        if(User::check()!==null){
            User::logout();
        }
        
    }


    public function delete(){
        if(empty($_POST['user_id'])){
            return "/";
        }

        $user = User::find($_POST['user_id']);
        if($user===null){
            return "/";
        }
        if(User::check()->hasRole("admin")&&User::check()->id!==$_POST['user_id']){

            $user->delete();
            return $_SERVER['HTTP_REFERER'];
        }
        return "/";
    }

}