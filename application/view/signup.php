<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/main.css">
    <link rel="stylesheet" href="../../public/styles/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Sign in/ Sign up | authentication - VOY</title>
  </head>
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
        <?php 
          session_start();
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
              echo "<a href='./login.php' class='btn-link link'>Sign In</a>"; 
            echo "</li>";
          }
        ?>    
      </ul>
    </div>
  </nav>
  
    <section class="authentication">
      <div class='sign-up'>
        <h2 class='title'>I don't have an Account</h2>
        <span>Sign up with your email and password</span>

        <form action="../controller/signup.inc.php" method="POST">
          <small class="error" id="signup-error"></small>
          <div class="group">
            <input placeholder="Full Name" class="form-input" id="signup-fname" type="text" name="fullName" required>
          </div>
          <div class="group">
            <input class="form-input" placeholder="User Name" id="signup-dname" type="text" name="userName" required>
          </div>
          <div class="group">
            <input class="form-input" placeholder="Email" id="signup-email" type="email" name="email" required>
          </div>
          <div class="group">
            <input class="form-input" placeholder="Password" id="signup-password" type="password" name="password" required>
          </div>
          <div class="group">
            <input class="form-input" placeholder="Confirm Password" id="signup-e-password" type="password" name="confirmPassword" required>
          </div>
          <button type="submit" name="signup" class="custom-button" id="signup-button">Sign Up</button>
        </form>
        <?php 
          if(isset($_GET["error"])) {
            if($_GET["error"] == "emptyinput") {
              echo "<p>fill in all the fields</p>";
            } else if($_GET["error"] == "invalidusername") {
              echo "<p>choose a proper username</p>";
            } else if($_GET["error"] == "invalidemail") {
              echo "<p>fill in a valid email</p>";
            } else if($_GET["error"] == "passwordsdontmatch") {
              echo "<p>passwords don't match</p>";
            } else if($_GET["error"] == "dataalreadyexists") {
              echo "<p>username or email already exists</p>";
            } else if($_GET["error"] == "none") {
              echo "<p>successfully logged in</p>";
              header("location: index.php");
            } else if($_GET["error"] == "invalidpassword") {
              echo "<p>Password must contain one uppercase, lowercase, number and special character with a minimum of 8 length and maximum of 25</p>";
            }
          }
        ?>
      </div>    
    </section>


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
                <h2 class="footer-title">Careers</h2>
                <a href="./writers.php" class="link footer-link">Writers</a>
                <a href="./contactus.php" class="link footer-link">Contact Us</a>
                <a href="#" class="link footer-link">How it works</a>
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
                <a href="../../public/index.php" class="link" id="footer-logo">VOY</a>
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

    
    <script src="../../public/js/main.js"></script>
    <!-- <script src="../../public/js/auth.js"></script> -->
  </body>
</html>
