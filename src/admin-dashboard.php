<?
set_include_path(getenv("INCLUDE_PATH"));
require_once("Models/User.php");

require_once('Controllers/XSSController.php');
if(User::check()===null){
    header("Location: /");
}
if(!User::check()->hasRole("admin")){
    header("Location: /");
}
$model = new User;
$users = $model->getAllStatement()->Pagenaite(10);
 ?>
<? include('views/main-layout.php');?>
<body>
    <?php include('views/navbar.php');?>
    <div class="container">
        <div class="main-container">
        
        <h3>Users</h3>
        <table>
        <tr>
            <th>name</th>
            <th>Username</th>
            <th>created at</th>
            <th>#</th>
            <th>#</th>
        </tr>
        <? foreach($users['data'] as $user) :?>
        <tr>
            <td><? print_str($user['name']) ?></td>
            <td><? print_str($user['username']) ?></td>
            <td><? print_str($user['created_at']) ?></td>
            <td>
                <a href="user-page?id=<? print_str($user['id']) ?>">posts</a>
            </td>
            <td>
                <? if(!User::find($user['id'])->hasRole("admin")) :?>
                <form action="user.php" method="post">
                    <input type="hidden" name="user_id" value="<? print_str( $user['id']) ?>">
                    <input type="hidden" name="_token" value="<? print_str( $token )?>">
                    <input type="hidden" name="route" value="delete">
                    <button class="btn red">delete</button>
                </form>
                <? else:?>
                # is an admin
                <?endif;?>
            </td>
        </tr>
        <?endforeach;?>
        </table>    
        </div>
    </div>
    <script src="js/navbar.js"></script>
</body>
</html> 