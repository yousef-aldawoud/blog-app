<?
session_start();
set_include_path("/var/www/html/");
require_once("middlewares.php");
require_once('./Models/Help.php');
require_once("Controllers/UserController.php");
require_once("Controllers/CSRFController.php");
require_once("Middlewares/AuthMiddleware.php");
require_once("Controllers/CommentController.php");

if(!isset($_POST['route'])){
    header("Location: /");
    die();
}
if(CSRFTokenController::getExpired($_POST['_token'])){
    $_SESSION['_token_error']=true;
    header("Location: /419.php");
    die();
}

$commentController = new CommentController();
switch($_POST['route']){
    case "create":        
        $link = "Location: ".$commentController->create();
        header($link);
        break;
    case "delete":
        echo "lel";
        break;
        
}
