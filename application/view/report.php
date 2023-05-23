<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Report page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../public/styles/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='../../public/styles/report.css'>
    <script src='main.js'></script>
</head>
<body>

  <nav class="navbar">
    <div class="navbar-container">
      <a href="../../index.php" class="link" id="navbar-logo">VOY</a>
      
      <div class="navbar-hamburger" id="mobile-bar-icon">
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
      </div>
      
      <ul class="navbar-menu menu">
        <li class="search-menu-item">
          <form action="./searchResult.php" method="POST">
            <div class='searchContainer'>
              <button class='iconButton' name="submit-search">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
              <input name="search" class='searchInput' placeholder='articles keyword' />
            </div>
          </form>
        </li>
        <?php 
          session_start();
          if(isset($_SESSION["userid"])) {
            $image = $_SESSION["userprofileimg"];
            echo "<li class=\"navbar-menu-item\">";
            // echo "<a href='../application/view/login.php'>Bookmarks</a>";
            echo "<a href='./login.php' class='navbar-link link'>";
            echo "<i class='fa-solid fa-bookmark'></i>";
            echo "<span>Favorites</span>";
            echo "</a>";
            echo "</li>";
            // echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/profile.php'>Signin</a>";
            // echo "<a href='../application/view/profile.php' class='btn-link link'>Profile</a>"; 
            // echo "</li>";
            echo "<li class= 'user-icon'> <a href= './profile.php' > <img src= 'images/uploads/$image'>  </a> </li>";
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
              echo "<a href='./login.php' class='btn-link link'>Sign In</a>"; 
            echo "</li>";
            echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/login.php'>Signin</a>";
              echo "<a href='./contactus.php' class='btn-link link'>Contact Us</a>"; 
            echo "</li>";
          }
        ?>    
      </ul>
    </div>
  </nav>
    <div class="mainCont">
    <ul id="repBar">
        <li>
            <a href="">Date of Publication</a>
            <ul>
                <form method="POST" action='../controller/report.inc.php'>
                    <li>
                        StartDate: <input type="date" name="startdate">
                    </li>
                    <li>
                        EndDate: <input type="date" name="enddate">
                    </li>
                    <li>
                        <button type="submit" name="filterdate">Show Results </button>
                    </li>
                </form>
            </ul>
        </li>
        <!-- <li>
            <a href="">Rating</a>
            <ul>
                <li><a href="">1 out of 5</a></li>
                <li><a href="">2 out of 5</a></li>
                <li><a href="">3 out of 5</a></li>
                <li><a href="">4 out of 5</a></li>
                <li><a href="">5 out of 5</a></li>
            </ul>
        </li> -->
    </ul>
    </div>
    <?php  include './components/footer.php' ?>

  <script src="./js/main.js"></script>
  <script src="./js/index.js"></script>  
</body>
</html>