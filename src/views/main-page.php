<? set_include_path("/var/www/html");?>
<div class="container">
    <div class="main-container">
        <h1>Articles</h1>
        <hr>
        <?php include('views/post.php')?>
        <?php include('views/post.php')?>
        <?php include('views/post.php')?>
        <?php include('views/post.php')?>
        <?php include('views/post.php')?>
        <?php include('views/post.php')?>
        <div class=" row center">

            <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="?page=1" class="active">1</a>
                <a href="?page=2">2</a>
                <a href="?page=3">3</a>
                <a href="?page=4">4</a>
                <a href="?page=0">&raquo;</a>
            </div>
        </div>
    </div>
    <div class="side-container">
        <h2>Pupular posts</h2>
        <h3>Post 1</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
        <h3>Post 2</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
        <h3>Post 2</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
    </div>
</div>