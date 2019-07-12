<?php
session_start();
set_include_path(getenv("INCLUDE_PATH"));
require_once("middlewares.php");
require_once("Models/Help.php");
require_once("Models/Post.php");
require_once("Models/User.php");
require_once("Controllers/CSRFController.php");
require_once("Controllers/XSSController.php");


include('views/main-layout.php');
?>

    
<body>
        <?php include('views/navbar.php');?>

        <?php if(empty($_GET['post_id'])){ ?>
        
        <div class="container">
            <div class="main-container">
                <h1>Post not found</h1>
                
            </div>
        </div>
        
        <?php die();}?>

        <?php if(Post::find($_GET['post_id'])===null){ ?>
        <div class="container">
            <div class="main-container">
                <h1>Post not found</h1>
                
            </div>
        </div>
        <?php die() ;
    }else{ 
            $post = Post::find($_GET['post_id']); 
    }?>


        <div class="container">
            <div class="main-container">

            <div>
                <div class="card">
                    <div class="card-content">
                        <h4><?php print_str($post->title) ?></h4>
                        <p><?php print_str($post->content)?></p>
                        <div class="row right">
                            <h5>by <?php
                            $user=User::find($post->user_id);
                            $user===null?print( "<b style='color:red'>user deleted</b>"):print_str($user->name) ;
                            ?></h5>
                        </div>
                    </div>
                    <div class="card-end" style="font-size:9pt;">
                        <?php
                            print_str("Created at ".$post->created_at);
                        ?>
                    </div>
                </div>
                <h3>Comments</h3>
                <hr>
                <?php if(User::check()!==null){ ?>
                <form action="/comments.php" method="post">
                    <input type="text" placeholder="Enter your comment" name="comment" class="textfield">
                    <input type="hidden" value="<?php print_str($token) ?>" name="_token">
                    <input type="hidden" value="<?php print_str($post->id) ?>" name="post_id">
                    <input type="hidden" value="create" name="route">
                    <div class="row right">
                        <button class="btn large">Comment</button>
                    </div>
                </form>
                <?php }?>
            </div>
            <?php if (isset($_SESSION['errors'])){ ?>
                        <div class="error">
                        <ul>
                        <?php foreach($_SESSION['errors'] as $error){?>

                        <li>
                            <?php echo $error; ?>
                        </li>
                        <?php
                            };
                            unset($_SESSION['errors']);
                        ?>
                        </ul>
                        </div>
                        <?php }?>

            <div>
                <?php foreach($post->comments()->orderByDate()->get() as $comment){?>
                <?php include "views/comment.php"; ?>
                <?php };?>
            </div>
            </div>
        </div>
        <script src="js/navbar.js"></script>
        <? require_once "views/footer.php"?>
    </body>
</html> 