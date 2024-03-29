<?php 
set_include_path(getenv("INCLUDE_PATH"));
require_once('Models/Post.php');
require_once('Models/User.php');
require_once('Controllers/XSSController.php');
$model = new Post;
if(isset($_GET['q'])){
    $query=[
        "title"=>"%".$_GET['q']."%",
        "content"=>"%".$_GET['q']."%"
    ];
    $posts = $model->like($query,6);
    
}else{

    $posts = $model->getAllStatement()->Pagenaite(6);
    $page = "?page";
}
?>
<div class="container">
    <div class="main-container">
        <h1>Posts</h1>
        <hr>
        <div style="padding:20px;">
            <?php if (User::check()!==null){?>
                <a href="/create-post.php" class="btn ma large">Create post</a>
            <?php } ?>

            <?php if($posts['total']===0){?>
                <p class="">No posts avalible</p>
            <?php }?>
        </div>
        <?php foreach($posts['data'] as $post){ ?>
            <?php include('views/post.php')?>
        <?php } ?>
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
    <div class="side-container">
        <h2>Famous quotes</h2>
        <h3>Qoute 1</h3>
        <p>Don't dream about success work for it </p>
        <h3>Qoute 2</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
    </div>
</div>
