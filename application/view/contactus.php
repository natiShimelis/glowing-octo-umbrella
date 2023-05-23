<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/styles/main.css">
    <link rel="stylesheet" href="../../public/styles/contactus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/64d58efce2" crossorigin="anonymous"></script>
    <title>Contact us | Voice of Youth</title>
</head>
<body>

    <!-- Header Section -->
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
        <form action="../application/view/searchResult.php" method="POST">
          <div class='searchContainer'>
            <button class='iconButton' name="submit-search">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <input name="search" class='searchInput' />
          </div>
        </form>
        </li>
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
              echo "<a href='../application/view/login.php' class='btn-link link'>Sign In</a>"; 
            echo "</li>";
          }
        ?>    
      </ul>
    </div>
  </nav>


    <!-- Form Section -->
    <div class="container">
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Let's Get in touch</h3>
                <p class="text">Want to get in touch? We would love to hear from you. you can contact us through the information provided or send us an Email through the form.</p>
                <div class="info">
                    <div class="information">
                        <i class="fas fa-envelope icon"></i>
                        <p>voiceofyouth@gmail.com</p>
                    </div>
                    <div class="information">
                        <i class="fas fa-phone-alt icon"></i>
                        <p>+251 95-161-3075</p>
                    </div>
                    <div class="information">
                        <i class="fas fa-map-marker-alt icon"></i>
                        <p>Bole Medhaniyalem, A.A</p>
                    </div>
                </div>
                <div class="social-media">
                    <p>Connect with us: </p>
                    <div class="social-icons">
                        <a class="anchor" href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a class="anchor" href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="anchor" href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="anchor" href="#">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>

                <form action="../controller/contactusmailer.inc.php" method="POST">
                    <h3 class="title">Contact Us</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input">
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input">
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="tel" name="phone" class="input">
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>

                    <button type="submit" name="contactus" class="btn">Send your Message</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <?php  include './components/footer.php' ?>

    <script src="../../public/js/main.js"></script>
    <script src="../../public/js/contactus.js"></script>
</body>
</html>