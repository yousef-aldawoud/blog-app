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
        <form class="row space-between">
            <div style="font-size:8pt;"><?print_str($comment['created_at']);?></div>
            
            <button class="btn-link red-text  small">delete</button>
        </form>
        <?else:?>
        <div style="font-size:8pt;"><?print_str($comment['created_at']);?></div>
    <? endif;?>
<?else:?>
<div style="font-size:8pt;"><?print_str($comment['created_at']);?></div>
<? endif;?>