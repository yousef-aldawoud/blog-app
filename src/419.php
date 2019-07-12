<?php
set_include_path(getenv("INCLUDE_PATH"));
session_start();
if(!isset($_SESSION['_token_error'])){
    header("Location: /");
}
include('views/main-layout.php');?>
    <body>
        <?php include('views/navbar.php');?>
        <div class="row center">
            <div class="card sm6 md4 lg3" style="background:white">
                <div class="card-title">419 request is expired</div>
                <div class="card-content">
                    <a href="/">return back to the main page</a>
                </div>
            </div>
        </div>
        <?

            unset($_SESSION['_token_error'])
        ?>
        <script src="js/navbar.js"></script>
    </body>
</html> 