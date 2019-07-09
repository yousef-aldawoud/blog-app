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
                <a href="/login.php" class="link">
                    <?php  
                        $user=User::check();
                        echo "Hello $user->name";
                    ?>
                </a>
            <?endif;?>
        </div>
        <form action="" class="search">
            <input type="search" name="q" placeholder="search..." />
            <button >Search</button>
        </form>
        <div class="nav-drawer">
            <button class="links-btn" id="list-btn" onclick="showLinks">Links ▼</button>
            <div class="link-list">

                <a class="nav-drawer-link collapsed-links" href="#contat">
                    About us
                </a>
                <a class="nav-drawer-link collapsed-links" href="/">
                    Contact
                </a>
                <a class="nav-drawer-link collapsed-links" href="/login.php">
                    login
                </a>
            </div>
        </div>
    </div>
    
</div>
