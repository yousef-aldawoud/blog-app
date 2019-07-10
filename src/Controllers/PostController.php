<?
set_include_path("/var/www/html/");

require_once("Models/User.php");
require_once("Models/Post.php");
class PostController{
    public function create(){
        if(empty($_POST['title'])||empty($_POST['content'])){
            $_SESSION['errors']=['Title can\'t be empty','Content can\'t be empty'];
            return $_SERVER['HTTP_REFERER'];
        }
        $post = new Post;
        $post->title = $_POST['title'];
        $post->content = $_POST['content'];
        $post->user_id = User::check()->id;
        $post->insert();
        $_SESSION['success']=['Post created'];        
        
        return "/";

    }
    public function update(){
        
    }

}