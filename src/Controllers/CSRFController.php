<?php
session_start();
set_include_path("var/www/html/");
require_once("Models/Help.php");
class CSRFTokenController{
    const TOKEN_LENGTH = 15;
    public static function csrf_token(){
        $token = Help::randomString(self::TOKEN_LENGTH);
        $_SESSION['_token']=$token;
        $_SESSION['_token_create_date'] = date('Y-m-d H:i:s');;
        return $_SESSION['_token'];
    }
    public static function getExpired($token){
        if($token!==$_SESSION['_token']){
            return true;
        }
        $datetime = new DateTime("now");
        
        $tokenTime = new DateTime($_SESSION['_token_create_date']);
        
        return $datetime->diff($tokenTime)->i >10;
    }
}