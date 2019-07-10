<?php
session_start();
require_once "Model.php";
require_once "Help.php";
require_once "Role.php";
class User extends Model{
    public static function authenticate($username,$password){
        $user = User::where("username","=",$username);
        if(count($user)<1){
            return null;
        }
        if(password_verify($password,$user[0]["password"])){
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
            return $user;
        }
        return null;
    }
    public static function logout(){
        unset($_SESSION['auth_token']);
    }

    public static function check(){
        $authToken = $_SESSION['auth_token'];
        $users = User::where("auth_token","=",$authToken);
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
            return null;
        }
        $password = password_hash($password,PASSWORD_DEFAULT);
        $user->name = $name;
        $user->username = $username;
        $user->password = $password;
        $user->insert();
        $row=User::where("username","=",$username);
        $user = User::find($row[0]['id']);
        return $user;
    }


    public function hasRole($roleSlug){
        $role = Role::where("slug","=",$roleSlug);
        $roleID = $role[0]['id'];
        $statement = $this->getConnection()->prepare("SELECT * FROM user_role WHERE user_id = ".$this->id." && role_id = $roleID");
        $statement->execute();
        return $statement->rowCount()>=1;
    }


}