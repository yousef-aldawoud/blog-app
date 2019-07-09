<?
session_start();

set_include_path("/var/www/html/");
require("Models/Help.php");
require("Controllers/CSRFController.php");
$token = CSRFTokenController::csrf_token();
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

                    <form actions="/login.php" method="post" class="row center wrap">
                        <input placeholder="Username" type="text" class="text-field" name="username" id="o">
                        <input  type="hidden" class="text-field" name="_token" value="<?echo $token;?>">
                        <input  type="hidden" class="text-field" name="route" value="signup">
                        <input placeholder="Password" type="password" name="password" class="text-field">
                        <button class="login-btn">LOGIN</button>
                    </form>
                </div> 
            </div>
        </div>
        <script src="js/navbar.js"></script>
    </body>
</html> 
