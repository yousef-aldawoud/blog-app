<? 
set_include_path("/var/www/html");
require_once('Models/Post.php');
require_once('Models/User.php');
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
            <? if (User::check()!==null):?>
                <a href="/create-post.php" class="btn ma large">Create post</a>
            <? endif; ?>

            <? if($posts['total']===0):?>
                <p class="">No posts avalible</p>
            <? endif ?>
        </div>
        <? foreach($posts['data'] as $post): ?>
            <?php include('views/post.php')?>
        <? endforeach; ?>
        <div class=" row center">

            <div class="pagination">
                <? if($posts['previous_page']>0) :?>
                    <a href="/?page=<?echo $posts['previous_page'] ?>">&laquo;</a>
                <? endif;?>
                <? for ($i=1 ;$i< $posts['number_of_pages']+1;$i++) :?>
                    <? if (!isset($_GET['q'])){
                        $link="/?page=$i";
                        
                    }else{
                        $link = "/?page=$i&q=".$_GET['q'];
                    }

                    ?>
                    <? if($posts['current']==$i) :?>
                        <a href="<? echo $link;?>" class="active"><? echo $i;?></a>
                    <? else :?>
                        <a href="<? echo $link;?>" ><? echo $i;?></a>
                        
                    <? endif ;?>
                <? endfor;?>
                <? if($posts['next_page']<=$posts['number_of_pages']) :?>
                    <a href="/?page=<?echo $posts['next_page'] ?>">&raquo;</a>
                <? endif;?>
            </div>
        </div>
    </div>
    <div class="side-container">
        <h2>Pupular posts</h2>
        <h3>Post 1</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
        <h3>Post 2</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
        <h3>Post 2</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
    </div>
</div>