<p>
<b>
<?
    $user=User::find($comment['user_id']);
    $user===null?print( "<b style='color:red'>user deleted</b>"):print_str($user->name) ;
?>:
</b>
<? print_str($comment['comment']) ?>

</p>
<? if(User::check()!==null):?>
    <?if(User::check()->hasRole("admin")||User::check()->id==$comment['user_id']):?>
        <form class="row space-between" action="/comments.php" method="post">
            <div style="font-size:8pt;"><?print_str($comment['created_at']);?></div>
            <input type="hidden" value="<? print_str($token) ?>" name="_token">
            <input type="hidden" value="delete" name="route">
            <input type="hidden" value="<? print_str($comment['id']) ?>" name="comment_id">
            <button class="btn-link red-text  small">delete</button>
        </form>
        <?else:?>
        <div style="font-size:8pt;"><?print_str($comment['created_at']);?></div>
    <? endif;?>
<?else:?>
<div style="font-size:8pt;"><?print_str($comment['created_at']);?></div>
<? endif;?>