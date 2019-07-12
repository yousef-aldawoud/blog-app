
<div class="card">
    <div class="card-title"><?php print_str( $post['title']) ?></div>

    <div class="card-content">
        <h5>by <a href="/user-page.php?id=<?php print_str($post['user_id'])?>">
        <?php 
            $user=User::find($post['user_id']);
            $user===null?print( "<b style='color:red'>user deleted</b>") : print_str($user->name) ;?>
        </a></h5>
        <?php print_str($post['content']) ?> <a href="/post-page.php?post_id=<?php print_str( $post['id']);?>" class="show-post-link">read more</a>
    </div>
    <div class="card-end">

    
        <?php if(User::check()!==null){?>
            <?php if(User::check()->hasRole("admin")||User::check()->id==$post['user_id']){?>
                <form action="posts.php" method="post">
                    <input type="hidden" name="post_id" value="<?php print_str( $post['id']) ?>">
                    <input type="hidden" name="_token" value="<?php print_str( $token )?>">
                    <input type="hidden" name="route" value="delete">
                    <button class="btn red large">Delete</button>
                    <?php if(User::check()->id==$post['user_id']){ ?>
                    <a class="btn large" href="/update-post.php?post_id=<?php print_str( $post['id'])?>">Edit</a>
                    <?php } ?>
                </form>    
            
            <?php } ?>
            <?php } ?>
    </div>
</div>