
<div class="card">
    <div class="card-title"><? echo $post['title'] ?></div>
    <div class="card-content"><? echo $post['content'] ?> <a href="/post-page.php?post_id=<? echo $post['id'];?>" class="show-post-link">read more</a></div>
    <div class="card-end">
        <? if(User::check()!==null):?>
            <?if(User::check()->hasRole("admin")||User::check()->id==$post['user_id']):?>
                <form action="posts.php" method="post">
                    <input type="hidden" name="post_id" value="<? echo $post['id'] ?>">
                    <input type="hidden" name="_token" value="<? echo $token ?>">
                    <input type="hidden" name="route" value="delete">
                    <button class="btn red large">Delete</button>
                    <a class="btn large" href="/update-post.php?post_id=<?echo $post['id']?>">Edit</a>
                </form>    
            
            <? endif ?>
        <?endif;?>
    </div>
</div>