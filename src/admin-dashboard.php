<?php
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
  include('views/main-layout.php');?>
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
        <?php foreach($users['data'] as $user) {?>
        <tr>
            <td><?php print_str($user['name']) ?></td>
            <td><?php print_str($user['username']) ?></td>
            <td><?php print_str($user['created_at']) ?></td>
            <td>
                <a href="user-page.php?id=<?php print_str($user['id']) ?>">posts</a>
            </td>
            <td>
                <?php if(!User::find($user['id'])->hasRole("admin")) {?>
                <form action="user.php" method="post">
                    <input type="hidden" name="user_id" value="<?php print_str( $user['id']) ?>">
                    <input type="hidden" name="_token" value="<?php print_str( $token )?>">
                    <input type="hidden" name="route" value="delete">
                    <button class="btn red">delete</button>
                </form>
                <?php }else{?>
                # is an admin
                <?php }?>
            </td>
        </tr>
                <?php }?>
        </table>    
        </div>
    </div>
    <script src="js/navbar.js"></script>
</body>
</html> 