<?php
set_include_path(getenv("INCLUDE_PATH"));
session_start();
require_once("Controllers/CSRFController.php");
require_once("middlewares.php");
$token = CSRFTokenController::csrf_token();
include('views/main-layout.php');?>
<body>
        <?php include('views/navbar.php');?>
        <div class="container">
            <div class="card login-card">
                
                <div class="card-title">
                    Sign-up
                </div>
                <div class="card-content">

                    <form action="/user.php" method="post" class="row center wrap">
                        <input placeholder="Username" type="text" class="text-field" name="username" id="o">
                        <input placeholder="Name" type="text" class="text-field" name="name" >
                        <input  type="hidden" class="text-field" name="_token" value="<?php echo $token;?>">
                        <input  type="hidden" class="text-field" name="route" value="signup">
                        <input placeholder="Password" type="password" name="password" class="text-field">
                        <button class="login-btn">Sign up</button>
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
    </body>
</html> 
