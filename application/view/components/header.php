<?php 
    session_start();

    if($_SERVER['PHP_SELF'] === "/public/index.php" && isset($_SESSION["userid"])) {
        echo "
            <nav class='navbar'>
                <div class='navbar-container'>
                <a href='./index.php' class='link' id='navbar-logo'>VOY</a>
      
                <div class='navbar-hamburger' id='mobile-bar-icon'>
                    <span class='hamburger-bar'></span>
                    <span class='hamburger-bar'></span>
                    <span class='hamburger-bar'></span>
                </div>
      
                <ul class='navbar-menu menu'>
                    <li class='search-menu-item'>
                        <div class='searchContainer'>
                            <button class='iconButton'>
                                <i class='fa-solid fa-magnifying-glass'></i>
                            </button>
                            <input class='searchInput' placeholder='search articles' />
                        </div>
                    </li>
        ";

        if(isset($_SESSION["userid"])) {
            echo "<li class=\"navbar-menu-item\">";
            // echo "<a href='../application/view/login.php'>Bookmarks</a>";
            echo "<a href='../application/view/login.php' class='navbar-link link'>";
            echo "<i class='fa-solid fa-bookmark'></i>";
            echo "<span>Favorites</span>";
            echo "</a>";
            echo "</li>";
            echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/profile.php'>Signin</a>";
            echo "<a href='../application/view/profile.php' class='btn-link link'>Profile</a>"; 
            echo "</li>";
            echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/utils/logout.utils.php'>Logout</a>";
            echo "<form class='navbar-menu-item navbar-btn' method='post'>";
            echo "  <button class='btn-link link' type='submit' name='logout'>Logout</button>";
            echo "</form>";
            // echo "<a href='../application/utils/logout.utils.php' class='btn-link link'>Log out</a>"; 
            echo "</li>";
          } else {
            echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/login.php'>Signin</a>";
              echo "<a href='../application/view/login.php' class='btn-link link'>Sign In</a>"; 
            echo "</li>";
          }

          echo "
                    </ul>
                </div>
            </nav>
          ";
    } else if(!isset($_SESSION["userid"])) {
        
    } else {
        
    }
?>