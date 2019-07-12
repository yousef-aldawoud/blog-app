<?php
session_start();
set_include_path(getenv("INCLUDE_PATH"));
require_once("middlewares.php");
require_once("Models/Help.php");
require_once("Controllers/CSRFController.php");

include('views/main-layout.php');?>
<body>
        <?php include('views/navbar.php');?>
        <div class="container">
            <div class="main-container">
                <form action="/posts.php" method="post" class="form row wrap">
                    <label for="title">Post title</label>
                    <input placeholder="Post title" name="title" id="title" type="text" class="textfield">
                    <input name="route"  type="hidden" value="create-post" >
                    <input name="_token"  type="hidden" value="<?php echo $token; ?>" >
                    <label for="content">Post content</label>
                    <textarea name="content" id="content" cols="30" class="textarea" placeholder="Post content" rows="10"></textarea>
                    <div class="sm6 lg6 md6 row right">
                        <button class="btn large">Create</button>
                    </div>
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
        <script src="js/navbar.js"></script>
    </body>
</html> 