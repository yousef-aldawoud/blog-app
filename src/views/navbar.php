<?
set_include_path("/var/www/html");
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
                <form action="/logout.php" method="post">
                <button class="logout-drop-btn">Logout</button>
                    <input type="hidden" value="" name="_token">
                </form>
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
                <button class="logout collapsed-links" href="/login.php">
                    logout
                </button>
            <? endif;?>
            </div>
        </div>
    </div>
    
</div>
