<?php
session_start();

set_include_path(getenv("INCLUDE_PATH"));
require_once("middlewares.php");
require_once("Models/Help.php");

 ?>
<?php include('views/main-layout.php');?>
        <?php include('views/navbar.php');?>
        <div class="container">
            <div class="card login-card">
                <div class="card-title">
                    Login
                </div>
                <div class="card-content">

                    <form action="/user.php" method="post" class="row center wrap">
                        <input placeholder="Username" type="text" class="text-field" name="username" >
                        <input  type="hidden" class="text-field" name="_token" value="<?php echo $token;?>">
                        <input  type="hidden" class="text-field" name="route" value="login">
                        <input placeholder="Password" type="password" name="password" class="text-field">
                        <button class="login-btn">LOGIN</button>
                    </form>
                    <?php if (isset($_SESSION['errors'])){ ?>
                        <div class="error">
                        <ul>
                        <?php foreach($_SESSION['errors'] as $error){?>

                        <li>
                            <?php echo $error; ?>
                        </li>
                        <?php
                        }
                            unset($_SESSION['errors']);
                        ?>
                        </ul>
                        </div>
                        <?php }?>
                </div> 
            </div>
        </div>
        <script src="js/navbar.js"></script>
    
