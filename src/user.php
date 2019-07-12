<?php
session_start();
set_include_path(getenv("INCLUDE_PATH"));
require_once("middlewares.php");
require_once('./Models/Help.php');
require_once("Controllers/UserController.php");
require_once("Controllers/CSRFController.php");
require_once("Middlewares/AuthMiddleware.php");

if(!isset($_POST['route'])){
    header("Location: /");
    die();
}
if(CSRFTokenController::getExpired($_POST['_token'])){
    $_SESSION['_token_error']=true;
    header("Location: /419.php");
    die();
}

$userController = new UserController();
switch($_POST['route']){
    case "login":        
        $link = "Location: ".$userController->login();
        header($link);
        break;
    case "signup":
    
        $link = "Location: ".$userController->signup();
        header($link);
        break;
    case "logout":
        $link = "Location: ".$userController->logout();
        header($link);
        break;
    
    case "delete":
        $link = "Location: ".$userController->delete();
        header($link);
        break;
}
