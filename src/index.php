<?php
set_include_path(getenv("INCLUDE_PATH"));

  include('views/main-layout.php');?>
<body>
        <?php include('views/navbar.php');?>
        <?php include('views/main-page.php');?>
        <script src="js/navbar.js"></script>
        <script src="js/posts.js"></script>
    </body>
</html> 