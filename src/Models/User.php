<?php
session_start();
require "Model.php";
require "Help.php";
class User extends Model{
    public static function authenticate($username,$password){
        $user = User::where("username","=",$username);
        if(count($user)<1){
            return false;
        }
        if(password_verify($password,$user[0]["password"])){
            echo "sc";
            $user = User::find($user[0]["id"]);
            $authToken = Help::randomString();
            $checkUniqueToken = true;
            while($checkUniqueToken){
                $users = User::where("auth_token","=",$authToken);    
                if(count($users)>0){
                    $authToken = Help::randomString();
                    continue;
                }
                $checkUniqueToken = false;
                break;
            }
            $_SESSION['auth_token']=$authToken;

            $user->auth_token = $authToken;
            $user->update();
        }
        
    }

    public static function check(){
        $authToken = $_SESSION['auth_token'];
        $users = User::where("auth_token","=",$authToken);
        var_dump(count($users));
        if(count($users)>0){
            $user = User::find($users[0]["id"]);
            return $user;
        }
        return null;
    }

    public static function createUser($username,$name,$password){
        $user = new static();
        $rows=User::where("username","=",$username);
        
        if(count($rows)>0){
            echo "continue";
            return null;
        }
        $password = password_hash($password,PASSWORD_DEFAULT);
        $user->name = $name;
        $user->username = $username;
        $user->password = $password;
        $user->insert();
        return $user;
    }
}