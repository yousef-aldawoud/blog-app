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
        <? if(empty($_GET['id'])): ?>
        <div class="container">
            <div class="main-container">
                <h1>User not found</h1>
                
            </div>
        </div>

        <? die() ?>
        <?endif;?>

        <? if(User::find($_GET['id'])===null): ?>
        <div class="container">
            <div class="main-container">
                <h1>User not found</h1>
                
            </div>
        </div>
        <? else:?>
        <? 
            $user = User::find($_GET['id']); 
            $posts=$user->posts()->Pagenaite(10);
        ?>
        <?endif;?>
        
        <div class="container">
            <div class="main-container">
            <h1>Posts</h1>
        <hr>
        <div style="padding:20px;">
            

            <? if($posts['total']===0):?>
                <p class="">No posts </p>
            <? endif ?>
        </div>
        <? foreach($posts['data'] as $post): ?>
            <?php include('views/post.php')?>
        <? endforeach; ?>
        <div class=" row center">

            <div class="pagination">
                <? if($posts['previous_page']>0) :?>
                    <a href="/?page=<?print_str( $posts['previous_page']) ?>">&laquo;</a>
                <? endif;?>
                <? for ($i=1 ;$i< $posts['number_of_pages']+1;$i++) :?>
                    <? if (!isset($_GET['q'])){
                        $link="/?page=$i";
                        
                    }else{
                        $link = "/?page=$i&q=".$_GET['q'];
                    }

                    ?>
                    <? if($posts['current']==$i) :?>
                        <a href="<? print_str( $link);?>" class="active"><? print_str( $i);?></a>
                    <? else :?>
                        <a href="<? print_str( $link);?>" ><? print_str( $i);?></a>
                        
                    <? endif ;?>
                <? endfor;?>
                <? if($posts['next_page']<=$posts['number_of_pages']) :?>
                    <a href="/?page=<?print_str( $posts['next_page']) ?>">&raquo;</a>
                <? endif;?>
            </div>
        </div>
    </div>