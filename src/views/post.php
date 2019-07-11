
<div class="card">
    <div class="card-title"><? print_str( $post['title']) ?></div>
    <div class="card-content"><? print_str($post['content']) ?> <a href="/post-page.php?post_id=<? print_str( $post['id']);?>" class="show-post-link">read more</a></div>
    <div class="card-end">

    
        <? if(User::check()!==null):?>
            <?if(User::check()->hasRole("admin")||User::check()->id==$post['user_id']):?>
                <form action="posts.php" method="post">
                    <input type="hidden" name="post_id" value="<? print_str( $post['id']) ?>">
                    <input type="hidden" name="_token" value="<? print_str( $token )?>">
                    <input type="hidden" name="route" value="delete">
                    <button class="btn red large">Delete</button>
                    <? if(User::check()->id==$post['user_id']): ?>
                    <a class="btn large" href="/update-post.php?post_id=<?print_str( $post['id'])?>">Edit</a>
                    <? endif ?>
                </form>    
            
            <? endif ?>
        <?endif;?>
    </div>
</div>