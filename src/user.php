<?
session_start();
set_include_path("/var/www/html/");
require('./Models/Help.php');
require("Controllers/UserController.php");
require("Controllers/CSRFController.php");
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
}