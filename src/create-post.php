<?
session_start();
set_include_path("var/www/html/");
require_once("middlewares.php");
require_once("Models/Help.php");
require_once("Controllers/CSRFController.php");
$token = CSRFTokenController::csrf_token();

 ?>
<? include('views/main-layout.php');?>
<body>
        <?php include('views/navbar.php');?>
        <div class="container">
            <div class="main-container">
                <form action="/posts.php" method="post" class="form row wrap">
                    <label for="title">Post title</label>
                    <input placeholder="Post title" name="title" id="title" type="text" class="textfield">
                    <input name="route"  type="hidden" value="create-post" >
                    <input name="_token"  type="hidden" value="<? echo $token; ?>" >
                    <label for="content">Post content</label>
                    <textarea name="content" id="content" cols="30" class="textarea" placeholder="Post content" rows="10"></textarea>
                    <div class="sm6 lg6 md6 row right">
                        <button class="btn large">Create</button>
                    </div>
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
        <script src="js/navbar.js"></script>
    </body>
</html> 