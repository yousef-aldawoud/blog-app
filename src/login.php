<?
session_start();

set_include_path("/var/www/html/");
require_once("middlewares.php");
require_once("Models/Help.php");

 ?>
<? include('views/main-layout.php');?>
<body>
        <?php include('views/navbar.php');?>
        <div class="container">
            <div class="card login-card">
                <div class="card-title">
                    Login
                </div>
                <div class="card-content">

                    <form action="/user.php" method="post" class="row center wrap">
                        <input placeholder="Username" type="text" class="text-field" name="username" >
                        <input  type="hidden" class="text-field" name="_token" value="<?echo $token;?>">
                        <input  type="hidden" class="text-field" name="route" value="login">
                        <input placeholder="Password" type="password" name="password" class="text-field">
                        <button class="login-btn">LOGIN</button>
                    </form>
                    <?if (isset($_SESSION['errors'])): ?>
                        <div class="error">
                        <ul>
                        <? foreach($_SESSION['errors'] as $error):?>

                        <li>
                            <? echo $error; ?>
                        </li>
                        <?
                            endforeach;
                            unset($_SESSION['errors']);
                        ?>
                        </ul>
                        </div>
                    <?endif;?>
                </div> 
            </div>
        </div>
        <script src="js/navbar.js"></script>
    </body>
</html> 
