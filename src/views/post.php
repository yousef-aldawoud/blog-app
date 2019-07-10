
<div class="card">
    <div class="card-title"><? echo $post['title'] ?></div>
    <div class="card-content"><? echo $post['content'] ?> <a href="" class="show-post-link">read more</a></div>
    <div class="card-end">
        <? if(User::check()!==null):?>
            <?if(User::check()->hasRole("admin")||User::check()->id==$post['user_id']):?>
                <form action="posts.php" method="post">
                    <input type="hidden" name="post_id" value="<? echo $post['id'] ?>">
                    <input type="hidden" name="_token" value="<? echo $token ?>">
                    <input type="hidden" name="route" value="delete">
                    <button class="btn red large">Delete</button>
                </form>    
            
            <? endif ?>
        <?endif;?>
    </div>
</div>