<?php
session_start();
set_include_path(getenv("INCLUDE_PATH"));
require_once("middlewares.php");
require_once("Models/Help.php");
require_once("Models/Post.php");
require_once("Models/User.php");
require_once("Controllers/CSRFController.php");


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
        <?php die() ?>
        <?php }?>

        <?php if(Post::find($_GET['post_id'])===null){ ?>
        <div class="container">
            <div class="main-container">
                <h1>Post not found</h1>
                
            </div>
        </div>
        <?php die() ?>
        <?php }else{
             
            $post = Post::find($_GET['post_id']); 
        }?>


        <div class="container">
            <div class="main-container">
                <form action="/posts.php" method="post" class="form row wrap">
                    <label for="title">Post title</label>
                    <input placeholder="Post title" name="title" id="title" value="<?php echo $post->title; ?>" type="text" class="textfield">
                    <input name="route"  type="hidden" value="update-post" >
                    <input name="_token"  type="hidden" value="<?php echo $token; ?>" >
                    <input name="post_id"  type="hidden" value="<?php echo $post->id; ?>" >
                    <label for="content">Post content</label>
                    <textarea name="content" id="content" cols="30" class="textarea" placeholder="Post content" rows="10" ><?php echo $post->content;?></textarea>
                    <div class="sm6 lg6 md6 row right">
                        <button class="btn large">Create</button>
                    </div>
                </form>
                <?php if (isset($_SESSION['errors'])){ ?>
                        <div class="error">
                        <ul>
                        <?php foreach($_SESSION['errors'] as $error){?>

                        <li>
                            <?php echo $error; ?>
                        </li>
                        <?php
                        }
                            unset($_SESSION['errors']);
                        ?>
                        </ul>
                        </div>
                        <?php }?>
            </div>
        </div>
        <script src="js/navbar.js"></script>
    </body>
</html> 