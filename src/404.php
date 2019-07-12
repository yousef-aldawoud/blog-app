<?php
set_include_path(getenv("INCLUDE_PATH"));
include('views/main-layout.php');?>
    <body>
        <?php include('views/navbar.php');?>
        <div class="row center">
            <div class="card sm6 md4 lg3" style="background:white">
                <div class="card-title">404 page not found</div>
                <div class="card-content">
                    <a href="/">return back to the main page</a>
                </div>
            </div>
        </div>
        <script src="js/navbar.js"></script>
    </body>
</html> 