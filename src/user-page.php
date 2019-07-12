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
        <?php if(empty($_GET['id'])){ ?>
        <div class="container">
            <div class="main-container">
                <h1>User not found</h1>
                
            </div>
        </div>

        <?php die();
        }?>

        <?php if(User::find($_GET['id'])===null){ ?>
        <div class="container">
            <div class="main-container">
                <h1>User not found</h1>
                
            </div>
        </div>
        <?php }else{
             
            $user = User::find($_GET['id']); 
            $posts=$user->posts()->Pagenaite(10);
        }?>
        
        <div class="container">
            <div class="main-container">
            <h1>Posts</h1>
        <hr>
        <div style="padding:20px;">
            

            <?php if($posts['total']===0){?>
                <p class="">No posts </p>
    <?php } ?>
        </div>
        <?php foreach($posts['data'] as $post){ 
             include('views/post.php');
         } ?>
        <div class=" row center">

        <div class="pagination">
                <?php if($posts['previous_page']>0) {?>
                    <a href="/?page=<?php print_str( $posts['previous_page']) ?>">&laquo;</a>
        <?php }?>
                <?php for ($i=1 ;$i< $posts['number_of_pages']+1;$i++) {?>
                    <?php if (!isset($_GET['q'])){
                        $link="/?page=$i";
                        
                    }else{
                        $link = "/?page=$i&q=".$_GET['q'];
                    }

                    ?>
                    <?php if($posts['current']==$i) {?>
                        <a href="<?php print_str( $link);?>" class="active"><?php print_str( $i);?></a>
                    <?php }else{?>
                        <a href="<?php print_str( $link);?>" ><?php print_str( $i);?></a>
                        
                    <?php }?>
                    <?php }?>
                <?php if($posts['next_page']<=$posts['number_of_pages']) {?>
                    <a href="/?page=<?print_str( $posts['next_page']) ?>">&raquo;</a>
                <?php }?>
            </div>
        </div>
    </div>