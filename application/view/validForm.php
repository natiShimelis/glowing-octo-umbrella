<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../styles/validForm.css'>
    <script src='main.js'></script>
</head>
<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
}

if (isset($_SESSION['IsWriter']) && $_SESSION['IsWriter']) {

    header("Location: Article.php");
}

?>

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
    
    <form enctype="multipart/form-data" action="../controller/validform.inc.php" method="post">
        <div class="login-box">
            <h1>Application Form</h1>
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="fullname" placeholder="Full name" value="<?= $_SESSION['FirstName'] . ' ' . $_SESSION['LastName']; ?>">
            </div>
            <div class=" textbox">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <input type="email" name="email" value="<?= $_SESSION['email'] ?>" placeholder="Email">
            </div>
            <div>
                <p>Upload your CV</p>
                <input type="file" id="myFile" name="fileToUpload">
            </div>
            <div class="textbox">
                <p>Why do you want to be a writer?</p>
                <i class="bi bi-textarea"></i>
                <textarea type="textarea" name="why" placeholder="Describe here..." rows="5" cols="50" maxlength="300">

                </textarea>
            </div>
            <input type="submit" class="btn" name="submit" value="Submit">
        </div>
    </form>
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
            <a href="./Article_list.php" class="link footer-link">Blogs</a>
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
</body>

</html>