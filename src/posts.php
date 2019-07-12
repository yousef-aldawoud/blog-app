<?php
session_start();
set_include_path(getenv("INCLUDE_PATH"));
require_once("middlewares.php");
require_once('./Models/Help.php');
require_once("Controllers/PostController.php");
require_once("Controllers/CSRFController.php");
require_once("Middlewares/AuthMiddleware.php");



if(CSRFTokenController::getExpired($_POST['_token'])){
    $_SESSION['_token_error']=true;
    
    header("Location: /419.php");
    die();
}
if(!isset($_POST['route'])){
    header("Location: /");
    die();
}
$authMiddleware = new AuthMiddleware();
$authMiddleware->next();

$postController = new PostController();
switch($_POST['route']){
    case "create-post":        
        $link = "Location: ".$postController->create();
        header($link);
        break;
    case "update-post":
        
        $link = "Location: ".$postController->update();
        header($link);
        break;
    case "delete":
        $link = "Location: ".$postController->delete();
        header($link);
        break;
}