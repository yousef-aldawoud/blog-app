<?
    session_start();
    set_include_path("/var/www/html");
    require_once('views/csrf_token.php');
?>
<div>
    <div class="bar ">
        <div class="title">

            <a href="/" ><div ><span class="first-title">My</span><span class="second-title">Blog</span></div></a>
        </div>
        
        <div class="links">
            <? if(User::check()==null) :?>
                <a href="/signup.php" class="link">Sign up</a>
                <a href="/login.php" class="link">Login</a>
            <? else :?>
            <div class="dropdown">
            <button class="dropbtn">
                <?
                    $user = User::check();
                    echo "Hello ".$user->name;
                ?>
            </button>
            <div class="dropdown-content">
                <form action="/user.php" method="post">
                    <input type="hidden" value="<? echo $token; ?>" name="_token">
                    <input type="hidden" name="route" value="logout">
                    <button class="logout-drop-btn">Logout</button>
                </form>
                <a href="/users.php?id=<? echo $user->id; ?>" class="logout-drop-btn">My posts</a>
            </div>
            </div> 
            <?endif;?>
        </div>
        <form action="" class="search">
            <input type="search" name="q" placeholder="search..." />
            <button >Search</button>
        </form>
        <div class="nav-drawer">
            <button class="links-btn" id="list-btn" onclick="showLinks">Links ▼</button>
            <div class="link-list">
            <? if(User::check()==null) :?>
                <a class="nav-drawer-link collapsed-links" href="/signup.php">
                    Sign-up
                </a>
                <a class="nav-drawer-link collapsed-links" href="/login.php">
                    login
                </a>
            <? else:?>

            <form action="/user.php" method="post">
            
                <button class="logout collapsed-links" href="/login.php">
                    logout
                </button>

                <input type="hidden" value="<? echo $token; ?>" name="_token">
                    <input type="hidden" name="route" value="logout">
            </form>
            <? endif;?>
            </div>
        </div>
    </div>
    
</div>
