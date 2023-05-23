<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../public/styles/main.css">
    <link rel="stylesheet" href="../../public/styles/aboutus.css">
    <link rel="stylesheet" type="text/css" href="../../public/styles/articles/style.css">
	  <link rel="stylesheet" type="text/css" href="../../public/styles/main.css">
	  <link rel="stylesheet" type="text/css" href="../../public/styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>About Us | VOY</title>
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
        <!-- <li class="search-menu-item">
          <form action="./searchResult.php" method="POST">
            <div class='searchContainer'>
              <button class='iconButton' name="submit-search">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
              <input name="search" class='searchInput' placeholder='articles keyword' />
            </div>
          </form>
        </li> -->
        <?php 
          session_start();
          if(isset($_SESSION["userid"])) {
            $image = $_SESSION["userprofileimg"];
            echo "<li class=\"navbar-menu-item\">";
            // echo "<a href='../application/view/login.php'>Bookmarks</a>";
            echo "<a href='../application/view/login.php' class='navbar-link link'>";
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
            echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/login.php'>Signin</a>";
              echo "<a href='../application/view/contactus.php' class='btn-link link'>Contact Us</a>"; 
            echo "</li>";
          }
        ?>    
      </ul>
    </div>
  </nav>

    <section class="about-us">
        <div class="about-us-container">
            <div class="about-us-hero">
                <h1 id="header1"><span>VO</span>ICE OF YOUTH</h1>
                <span>We stand to be voice for the youth</span>
            </div>

            <div class="about-us-wrapper">
                <div class="about-us-container">
                    <h1 id="header">We welcome you to our website </h1>
                    <div class="container-1">
                        <div class="paracontainer">
                            <h1>About us</h1>
                            <p>
                                While many teenagers pick up sexual health information from sources other than schools
                                like
                                parents,
                                peers, social media and pop culture, sometimes that information is not accurate or it is
                                biased
                                and
                                can be
                                misleading. This has led to an increasing demand from young people for reliable
                                information,
                                which
                                prepares them
                                for a safe, productive and fulfilling life.
                            </p>
                        </div>
                        <div class="about-image-container">
                            <img class="image" src="../../public/images/teams.svg.svg" alt="teams of image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="discription-container">

                <div class="services">
                    <div class="service-image">
                        <img src="../../public/images/articles-reading.svg" alt="articles-reading image">
                    </div>
                    <div class="paragraph-holder">
                        <p> Have a positive self-image and have a respect for themselves.
                        </p>
                    </div>

                </div>

                <div class="services">
                    <div class="service-image">
                        <img src="../../public/images/blog.svg.svg" alt="blog picture">
                    </div>

                    <div>
                        <p> Enable young people appreciate the importance of relationships.
                        </p>
                    </div>
                </div>

                <div class="services">
                    <div class="service-image">
                        <img src="../../public/images/create-contents.svg" alt="create-content picture">
                    </div>
                    <div>
                        <p> Combat sexual exploitation and the misuse of sex.
                        </p>
                    </div>
                </div>
            </div>

            <div class="info-container">
                <div class="img-paragraph">
                    <div class="paragraph-container">
                        <p>
                            Due to the problems raised above and more, we intend to build a blog that is mainly focused
                            on
                            providing sex education for teenagers. The contents of comprehensive sex education extend
                            beyond
                            teaching safe reproductive choices and diseases that could possibly spread from sexual
                            activity
                            (although these are important too).
                        </p>
                    </div>
                    <div class="image-wrapper">
                        <div class="image-container">
                            <img src="../../public/images/self_confidence.jpg" alt="picture about us">
                        </div>
                        <div class="image-container">
                            <img src="../../public/images/image1.jpg" alt="picture about us">
                        </div>
                        <div class="image-container">
                            <img src="../../public/images/image2.jpg" alt="picture about us">
                        </div>
                        <div class="image-container">
                            <img src="../../public/images/image3.jpg" alt="picture about us">
                        </div>
                    </div>
                </div>
            </div>

            <div class="middle-section">
                <h1>Because we stand to help you.</h1>
                <p>Make youngsters understand why some actions are considered good and others bad andto begin
                    to making informed decisions on matters of personal health well-being and safety.
                </p>
                <p>
                    Let teenagers be aware of the existence, nature and methods of transmission of sexually
                    transmitted diseases including HIV.
                </p>
            </div>

            <div class="bottom-section">
                <h1>want to connect?</h1>
                <p>phone <number>+251 966019134</number>
                </p>
            </div>
        </div>
    </section>

    <?php  include './components/footer.php' ?>

    <script src="../js/main.js"></script>
</body>

</html>