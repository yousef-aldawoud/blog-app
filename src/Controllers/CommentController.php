<?

set_include_path("/var/www/html/");

require_once("Models/User.php");
require_once("Models/Post.php");
require_once("Models/Comment.php");
class CommentController{
    public function create(){
        if(empty($_POST['comment'])||empty($_POST['post_id'])){
            $_SESSION['errors']=['Title can\'t be empty','Content can\'t be empty'];
            return $_SERVER['HTTP_REFERER'];
        }
        if(User::check()===null){
            return $_SERVER['HTTP_REFERER'];
        }
        $comment = new Comment;
        $comment->post_id = $_POST['post_id'];
        $comment->comment = $_POST['comment'];
        $comment->user_id = User::check()->id;
        $comment->insert();
        $_SESSION['success']=['Post created'];        
        
        return $_SERVER['HTTP_REFERER'];

    }
    public function delete(){
        $comment = Comment::find($_POST['comment_id']);
        if($comment === null){
            return $_SERVER['HTTP_REFERER'];
        }
        if(User::check()->id===$comment->user_id&&User::check()->hasRole("admin")){
            return $_SERVER['HTTP_REFERER'];
        }
        $comment->delete();
        return $_SERVER['HTTP_REFERER'];
    }
}