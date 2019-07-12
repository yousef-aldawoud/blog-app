<?php
    session_start();
    set_include_path(getenv("INCLUDE_PATH"));
    require_once('views/csrf_token.php');
?>
<div>
    <div class="bar ">
        <div class="title">

            <a href="/" ><div ><span class="first-title">My</span><span class="second-title">Blog</span></div></a>
        </div>
        
        <div class="links">
            <?php if(User::check()==null) {?>
                <a href="/signup.php" class="link">Sign up</a>
                <a href="/login.php" class="link">Login</a>
            <?php } else {?>
            <div class="dropdown">
            <button class="dropbtn">
                <?php
                    $user = User::check();
                    echo "Hello ".$user->name;
                ?>
            </button>
            <div class="dropdown-content">
                <form action="/user.php" method="post">
                    <input type="hidden" value="<?php echo $token; ?>" name="_token">
                    <input type="hidden" name="route" value="logout">
                    <button class="logout-drop-btn">Logout</button>
                </form>
                <a href="/user-page.php?id=<?php echo $user->id; ?>" class="logout-drop-btn">My posts</a>
                <?php if ($user=User::check()){?>
                    <?php if(User::check()->hasRole("admin")){?>
                        <a href="/admin-dashboard.php" class="logout-drop-btn">admin</a>
                    <?php };?>
            <?php } ?>
            </div>
            </div> 
            <?php }?>
        </div>
        <form action="/index.php" class="search">
            <input type="search" name="q" placeholder="search..." />
            <button >Search</button>
        </form>
        <div class="nav-drawer">
            <button class="links-btn" id="list-btn" onclick="showLinks">Links ▼</button>
            <div class="link-list">
            <?php if(User::check()==null){?>
                <a class="nav-drawer-link collapsed-links" href="/signup.php">
                    Sign-up
                </a>
                <a class="nav-drawer-link collapsed-links" href="/login.php">
                    login
                </a>
            <?php }else{?>

            <form action="/user.php" method="post">
            
                <button class="logout collapsed-links" href="/login.php">
                    logout
                </button>
                <input type="hidden" value="<?php echo $token; ?>" name="_token">
                    <input type="hidden" name="route" value="logout">
                <a href="/user-page.php?id=<?php echo User::check()->id ?>" class="logout navlinkside collapsed-links" >My posts</a>
            </form>
            <?php } ?>
            </div>
        </div>
    </div>
    
</div>
