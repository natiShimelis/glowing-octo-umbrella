<?php
header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self';");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./styles/index.css">
      <link rel="stylesheet" href="./styles/main.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <title>Voice of Youth | Read and Write Articles</title>
  </head>
<body>
  <?php 
    if(isset($_POST['logout'])) {
      session_start();
      session_unset();
      session_destroy();
    }
  ?>

  <nav class="navbar">
    <div class="navbar-container">
      <a href="./index.php" class="link" id="navbar-logo">VOY</a>
      
      <div class="navbar-hamburger" id="mobile-bar-icon">
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
      </div>
      
      <ul class="navbar-menu menu">
        <li class="search-menu-item">
        <?php
          session_start(); // Start or resume the session

        // Generate a CSRF token
          $csrfToken = bin2hex(random_bytes(32));

        // Store the token in the session for later validation
          $_SESSION['csrf_token'] = $csrfToken;
        ?>
          <form action="../application/view/searchResult.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
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
            echo "<a href='./index.php' class='navbar-link link'>";
            echo "<i class='fa-solid fa-bookmark'></i>";
            echo "<span>Favorites</span>";
            echo "</a>";
            echo "</li>";
            // echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/profile.php'>Signin</a>";
            // echo "<a href='../application/view/profile.php' class='btn-link link'>Profile</a>"; 
            // echo "</li>";
            echo "<li class= 'user-icon'> <a href= '../application/view/profile.php' > <img src= 'images/uploads/$image'>  </a> </li>";
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
            echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/login.php'>Signin</a>";
              echo "<a href='../application/view/contactus.php' class='btn-link link'>Contact Us</a>"; 
            echo "</li>";
          }
        ?>    
      </ul>
    </div>
  </nav>
  
  <section class="contents">
    <!--   Main Content   -->
    <div class="contents-main">
      <!-- Hero Container -->
      <div class="hero-carousel">
        <h1>Top Articles</h1>
        <div class="carousel-item carousel-item-visible">
          <div class="hero-image-container">
            <img src="./images/Sex_Ed_1.jpg" alt="">
          </div> 
          <a href="../application/view/articles/article.php" class="link">
            <div class="hero-article-info">
              <h1 class="hero-article-header">Importance of Inclusive education</h1>
              <div class="hero-article-data">
                <span class="hero-article-date">Nov 11, 2021</span>
                <div class="hero-article-options">
                  <div class="hero-article-writer">
                    <div class="hero-user-icon">
                      <img src="https://media.istockphoto.com/photos/headshot-of-44-year-old-mixed-race-man-in-casual-polo-shirt-picture-id1264106963?b=1&k=20&m=1264106963&s=170667a&w=0&h=dLQliHpFkaweGQhiRfkNGkwsAPoKCEy9UWWk-m2iCCk=" alt="">
                    </div>
                    <span>Nathnael Mekonnen</span>
                  </div>
                  <i class="fa-solid fa-bookmark"></i>
                  <i class="fa-solid fa-ellipsis"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      
        <div class="carousel-item">
          <div class="hero-image-container">
              <img src="https://img.freepik.com/free-vector/sexual-education-concept_277904-6946.jpg?size=626&ext=jpg" alt="">
          </div>
          <a href="../application/view/articles/article2.php" class="link">
            <div class="hero-article-info">
              <h1 class="hero-article-header">Why Inclusive Sex ED is important</h1>
              <div class="hero-article-data">
                <span class="hero-article-date">Jan 26, 2022</span>
                <div class="hero-article-options">
                  <div class="hero-article-writer">
                    <div class="hero-user-icon">
                      <img src="https://media.istockphoto.com/photos/headshot-of-44-year-old-mixed-race-man-in-casual-polo-shirt-picture-id1264106963?b=1&k=20&m=1264106963&s=170667a&w=0&h=dLQliHpFkaweGQhiRfkNGkwsAPoKCEy9UWWk-m2iCCk=" alt="">
                    </div>
                    <span>Mahlet Tizazu</span>
                  </div>
                  <i class="fa-solid fa-bookmark"></i>
                  <i class="fa-solid fa-ellipsis"></i>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="carousel-item ">
          <div class="hero-image-container">
            <img src="./images/Body_image_1.png" alt="">
          </div>
          <a href="../application/view/articles/article.php" class="link">
            <div class="hero-article-info">
              <h1 class="hero-article-header">Positive Body image</h1>
              <div class="hero-article-data">
                <span class="hero-article-date">Dec 26, 2021</span>
                <div class="hero-article-options">
                  <div class="hero-article-writer">
                    <div class="hero-user-icon">
                      <img src="https://media.istockphoto.com/photos/headshot-of-44-year-old-mixed-race-man-in-casual-polo-shirt-picture-id1264106963?b=1&k=20&m=1264106963&s=170667a&w=0&h=dLQliHpFkaweGQhiRfkNGkwsAPoKCEy9UWWk-m2iCCk=" alt="">
                    </div>
                    <span>Mahlet Assbu</span>
                  </div>
                  <i class="fa-solid fa-bookmark"></i>
                  <i class="fa-solid fa-ellipsis"></i>
                </div>
              </div>
            </div>
          </a>
        </div>

        <div class="carousel-item">
          <div class="hero-image-container">
              <img src="./images/STD.jpg" alt="Sexually transmitted disease image representation">
          </div>
          <a href="../application/view/articles/article2.php" class="link">
            <div class="hero-article-info">
                <h1 class="hero-article-header">What can you do to keep yourself safe from STDs?</h1>
                <div class="hero-article-data">
                  <span class="hero-article-date">Dec 26, 2021</span>
                  <div class="hero-article-options">
                    <div class="hero-article-writer">
                      <div class="hero-user-icon">
                        <img src="https://media.istockphoto.com/photos/headshot-of-44-year-old-mixed-race-man-in-casual-polo-shirt-picture-id1264106963?b=1&k=20&m=1264106963&s=170667a&w=0&h=dLQliHpFkaweGQhiRfkNGkwsAPoKCEy9UWWk-m2iCCk=" alt="">
                      </div>
                      <span>Nahom Temam</span>
                    </div>
                    <i class="fa-solid fa-bookmark"></i>
                    <i class="fa-solid fa-ellipsis"></i>
                  </div>
                </div>
            </div>
          </a>
        </div>
        
        <div class="carousel-actions">
            <button class="carousel-preview-btn" id="previous" aria-label="previous">
                <i class="fa-solid fa-angle-left"></i>
            </button>
            <button class="carousel-preview-btn" id="next" aria-label="next">
                <i class="fa-solid fa-angle-right"></i>
            </button>
        </div>
      </div>

      <!-- Blog Lists -->

      <div class="blog-wrapper">
        <div class="read-options">
          <button id="blog-option-1" class="blog-option">following</button>
          <button id="blog-option-2" class="blog-option">recommended</button>
        </div>

        <!-- Cards List At first it is empty but when loaded it gives the articles card -->
        <div class="blog-cards" id="card-lists"></div>
      </div>            
    </div>

    <!--  Sidebar  -->
    <div class="contents-sidebar">
      <div class="sidebar-container">
        <div class="recommended-topics">
          <h1 class="recommendations-header">Recommended Topics</h1>
          <div class="recommendations-container">
            <button class="recommendation">Hardship</button>
            <button class="recommendation">Hygine</button>
            <button class="recommendation">Safety</button>
            <button class="recommendation">Mental health</button>
            <button class="recommendation">Sexual assault</button>
            <button class="recommendation">Healthy relationship</button>
            <button class="recommendation">Positive self image</button>
            <button class="recommendation">Self confidence</button>
            <button class="recommendation">Adolescence</button>
          </div>
        </div>
        <div class="to-follow">
          <h1 class="to-follow-header">People to follow</h1>
          <div class="peoples-container">
            <div class="people-wrapper">
              <div class="user-icon">
                <img src="https://www.biography.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cfl_progressive%2Cq_auto:good%2Cw_1200/MTgxMTU0MTYyMjA4MTU0NzEy/therapist-westheimer-addressed-sexual-performance-issues-in-this-advice-series-photo-by-donna-svennevikwalt-disney-television-via-getty-images.jpg" alt="">
              </div>
              <div class="people-info">
                <h1 class="info-name">Dr.Ruth Westhemier</h1>
                <p class="info-description">A German-American sex therapist, talk show host, author, professor, Holocaust survivor, and former Haganah sniper.</p> 
              </div>
              <button class="follow-button" onclick="follow(0)">follow</button>
            </div>
            <div class="people-wrapper">
              <div class="user-icon">
                <img src="https://m.media-amazon.com/images/M/MV5BNDQ3NGZlMDYtOTA1Mi00ZWJhLTliZTctMjQ0MWNkZGQ0OTEzXkEyXkFqcGdeQXVyNjUxMjc1OTM@._V1_.jpg" alt="">
              </div>
              <div class="people-info">
                <h1 class="info-name">Dr.Justin Lehmiller</h1> 
                <p class="info-description">An American social psychologist and author. He is a research fellow at the Kinsey Institute at Indiana University.</p>
              </div>
              <button class="follow-button" onclick="follow(1)">follow</button>
            </div>
            <div class="people-wrapper">
              <div class="user-icon">
                <img src="https://i.guim.co.uk/img/media/2cbb7b18e8238dd463907a82cc7be7160360a1c9/1066_55_3689_2214/master/3689.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=142a0209a663880757df8b428e76680e" alt="">
              </div>
              <div class="people-info">
                <h1 class="info-name">Jordan Peterson</h1>
                <p class="info-description">A Canadian clinical psychologist, YouTube personality, author, and a professor emeritus at the University of Toronto</p> 
              </div>
              <button class="follow-button" onclick="follow(2)">follow</button>
            </div>
          </div>
        </div>
        <div class="saved-list"></div>
      </div>
    </div>
  </section>    

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-links">
        <div class="footer-link-wrapper">
          <div class="footer-link-items">
            <h2 class="footer-title">Help</h2>
            <a href="../application/view/faq.php" class="link footer-link">FAQ's</a>
            <a href="../application/view/report.php" class="link footer-link">Report</a>
          </div>
          <div class="footer-link-items">
            <h2 class="footer-title">About us</h2>
            <a href="../application/view/aboutus.php" class="link footer-link">About Us</a>  
            <a href="#" class="link footer-link">Blogs</a>
            <a href="#" class="link footer-link">Testimonials</a>
          </div>
        </div>
        <div class="footer-link-wrapper">
          <div class="footer-link-items">
          <h2 class="footer-title">Services</h2>
            <a href="../application/view/writers.php" class="link footer-link">Authoring</a>
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
            <a href="./index.php" class="link" id="footer-logo">VOY</a>
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

  <script src="./js/main.js"></script>
  <script src="./js/index.js"></script>   
</body>
</html>