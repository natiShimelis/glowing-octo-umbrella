<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Write Articles</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="../../public/styles/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' type='text/css' media='screen' href='../../public/styles/article_submitted.css'>
</head>
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: ./login.php");
}
if (!isset($_SESSION['IsWriter']) || !$_SESSION['IsWriter']) {

    header("Location: ./validForm.php");
}
?>
<body>
<nav class="navbar">
    <div class="navbar-container">
      <a href="../../public/index.php" class="link" id="navbar-logo">VOY</a>
      
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
        //   session_start();
          if(isset($_SESSION["userid"])) {
            $image = $_SESSION["userprofileimg"];
            echo "<li class=\"navbar-menu-item\">";
            // echo "<a href='../application/view/login.php'>Bookmarks</a>";
            echo "<a href='../../index.php' class='navbar-link link'>";
            echo "<i class='fa-solid fa-bookmark'></i>";
            echo "<span>Favorites</span>";
            echo "</a>";
            echo "</li>";
            // echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/profile.php'>Signin</a>";
            // echo "<a href='../application/view/profile.php' class='btn-link link'>Profile</a>"; 
            // echo "</li>";
            echo "<li class= 'user-icon'> <a href= './profile.php' > <img src= '../../public/images/uploads/$image'>  </a> </li>";
            // echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // // echo "<a href='../application/utils/logout.utils.php'>Logout</a>";
            // echo "<form class='navbar-menu-item navbar-btn' method='post'>";
            // echo "  <button class='btn-link link' type='submit' name='logout'>Logout</button>";
            // echo "</form>";
            // echo "<a href='../application/utils/logout.utils.php' class='btn-link link'>Log out</a>"; 
            // echo "</li>";
          } else {
            echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/login.php'>Signin</a>";
              echo "<a href='../application/view/login.php' class='btn-link link'>Sign In</a>"; 
            echo "</li>";
          }
        ?>    
      </ul>
    </div>
  </nav>
    <div class="main containerForm">
        <form action="../controller/process.php" method="POST">
            <div class="input-field">
                <label for="title">Enter title</label>
                <input class="titleInput" type="text" name="Article_title" id="title">
                <label for="title">Enter Category</label>
                <input type="text" name="Category" id="cat">
            </div>
                <textarea name="Article_content" id="Article_editor"></textarea>
            <input class="checkForm" type="checkbox" name="anonymous" id="anonymousWriter">
            <label for="anonymousWriter">Check this box if you want to send this anonymously</label><br>
            <input class="btn" type="submit" name="submit_data" value="Send">
        </form>
    </div>
    <footer class="footer">
    <div class="footer-container">
      <div class="footer-links">
        <div class="footer-link-wrapper">
          <div class="footer-link-items">
            <h2 class="footer-title">Help</h2>
            <a href="./faq.php" class="link footer-link">FAQ's</a>
            <a href="./report.php" class="link footer-link">Report</a>
          </div>
          <div class="footer-link-items">
            <h2 class="footer-title">About us</h2>
            <a href="./aboutus.php" class="link footer-link">About Us</a>  
            <a href="#" class="link footer-link">Blogs</a>
            <a href="#" class="link footer-link">Testimonials</a>
          </div>
        </div>
        <div class="footer-link-wrapper">
          <div class="footer-link-items">
          <h2 class="footer-title">Services</h2>
            <a href="./writers.php" class="link footer-link">Authoring</a>
          </div>
          <div class="footer-link-items">
            <h2 class="footer-title">Legal</h2>
            <a href="#" class="link footer-link">Terms</a>
            <a href="#" class="link footer-link">Services</a>
            <a href="#" class="link footer-link">Privacy</a>
          </div>
        </div>
      </div>
      
      <section class="social-media">
        <div class="social-media-wrap">
          <div class="footer-logo">
            <a href="../../index.php" class="link" id="footer-logo">VOY</a>
          </div>
          <p class="website-rights">&copy; Voice of Youth <script>document.write(new Date().getFullYear())</script>. All rights reserved</p>
          <div class="social-icons">
            <a href="#" class="social-icon-link link" target="_blank">
              <i class="fa-brands brand fa-facebook"></i>
            </a>

            <a href="#" class="social-icon-link link" target="_blank">
              <i class="fa-brands brand fa-instagram"></i>
            </a>

            <a href="#" class="social-icon-link link" target="_blank">
              <i class="fa-brands brand fa-twitter"></i>
            </a>
            
            <a href="#" class="social-icon-link link" target="_blank">
              <i class="fa-brands brand fa-telegram"></i>
            </a>
          </div>
        </div>
      </section>
    </div>
  </footer>

    <script src="../js/main.js"></script>
    <script src="../js/index.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('Article_editor');
    </script>
</body>
</html>