<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../../public/styles/articles/style.css">
    <link rel="stylesheet" type="text/css" href="../../../public/styles/main.css">
	  <link rel="stylesheet" type="text/css" href="../../../public/styles/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Body Image | articles - VOY</title>
  </head>
  <body>
  <nav class="navbar">
    <div class="navbar-container">
      <a href="../../../index.php" class="link" id="navbar-logo">VOY</a>
      
      <div class="navbar-hamburger" id="mobile-bar-icon">
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
      </div>
      
      <ul class="navbar-menu menu">
        <li class="search-menu-item">
          <form action="../../searchResult.php" method="POST">
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
            echo "<a href='../application/view/login.php' class='navbar-link link'>";
            echo "<i class='fa-solid fa-bookmark'></i>";
            echo "<span>Favorites</span>";
            echo "</a>";
            echo "</li>";
            // echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/profile.php'>Signin</a>";
            // echo "<a href='../application/view/profile.php' class='btn-link link'>Profile</a>"; 
            // echo "</li>";
            echo "<li class= 'user-icon'> <a href= '../profile.php' > <img src= '../../../public/images/uploads/$image'>  </a> </li>";
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

    <div class="articles-container">
      <h1 class="article-header">What is body image?</h1>
      <div class="article-content">
        <div class="leftcolumn">
          <div class="card">
            <ul>
              <li>Definition</li>
              <li>Positive body image</li>
              <li>Negative body image</li>
              <li>Tips</li>
            </ul>
     
            <img src="../../../public/images/bodyimg.jpeg" width="380" height="300">
            <p>Body image refers to how an individual sees their own body and how attractive they feel themselves to be.
              Many people have concerns about their body image. These concerns often focus on weight, skin, hair, or the shape or size of a certain body part.
              However, body image does not only stem from what we see in the mirror. According to some studies, a range of beliefs, experiences, and generalizations also contribute.
              Throughout history, people have given importance to the beauty of the human body. Society, media, social media, and popular culture often shape these views, and this can affect how a person sees their own body. However, popular standards are not always helpful.<br>
              Constant bombardment by media images can cause people to feel uncomfortable about their body, leading to distress and ill health. It can also affect work, social life, and other aspects of life. This article will look at positive and negative body image and provide some tips on how to improve body image</p>
   
            <h3>What does body image mean?</h3>
            <p>Body image refers to a persons emotional attitudes, beliefs, and perceptions of their own body. Experts describe body image relates to:</p>
            <ul>
              <li>what a person believes about their appearance</li>
              <li>how they feel about their body, height, weight, and shape</li>
              <li>how they sense and control their body as they move</li>
            </ul>
            <h3>What is a positive body image?</h3>
            <p>Having a positive body image includes:
              <ul>
                <li>accepting and appreciating the whole of ones body, including how it looks and what it can do</li>
                <li> having a broad concept of beauty</li>
                <li>having a body image that is stable</li>
                <li>having inner positivity</li>
              </ul>
              Some have asked whether accepting a larger body may deter people from taking action to be healthy. However, body positivity is not just about the size or appearance of the body. Confidence and control are also key factors.
            </p>
            <h3>What is a negative body image?</h3>
            <p>A person with a negative body image feels dissatisfied with their body and their appearance. The person may:
            <ul>
              <li>compare themselves with others and feel inadequate when doing so</li>
              <li>feel ashamed or embarrassed</li>
              <li>lack confidence</li>
              <li>feel uncomfortable or awkward in their body</li>
              <li>see parts of their body, such as their nose, in a distorted way</li>
            </ul>
              In some cases, having a negative body image can lead to the development of mental health issues, such as depression.
              A person may also pursue unnecessary surgery, unsafe weight loss habits- such as crash dieting- or an inappropriate use of hormones to build muscles. There is a strong link between eating disorders and negative body image, according to the NEDA.
              Some people develop BDD. A person with BDD sees a part or all of their body in a negative way. They may ask for cosmetic surgery to “correct” their nose size, for example, when to everyone else, it appears normal.<br>
              Where does a negative body image come from?
              A body image does not develop in isolation. Culture, family, and friends all convey positive and negative messages about the body.
              The media, peers, and family members can all influence a person’s body image. They can encourage people, even from a young age, to believe that there is an ideal body. The image is often an unnatural one. The fashion industry also sets an unhealthy example when they employ underweight models to display their products.
              Discrimination based on race, size, ability, gender orientation, and age also plays a role. Exposure to daily microaggressions at work and in society can cause people to feel that they do not measure up or that they are somehow lacking.
              Illness and accidents can also have an impact. Skin conditions, a mastectomy for breast cancer or a limb amputation can cause people to rethink how they appear to themselves and to others.<br>
              All of these factors can impact a person's mental and physical well-being.
              Body disparaging conversations include "fat talk," which refers to when people talk about how "fat" they look or feel. These conversations can lead to further negative feelings, low mood, or negative eating patterns.
              </p>

              <h3>Tips for improving body image</h3>
              <p>
                <ul>
                  <li>Spend time with people who have a positive outlook.</li>
                  <li>Practice positive self-talk. Say, "my arms are strong" rather than, "my arms are flappy"</li>
                  <li>Wear comfortable clothes that look good on you.</li>
                  <li>Avoid comparing yourself with other people.</li>
                  <li>Remember that beauty is not just about appearance.</li>
                  <li>Appreciate what your body can do, such as laughing, dancing, and creating.</li>
                  <li>Be actively critical of media messages and images that make you feel as if you should be different.</li>
                  <li>Make a list of 10 things you like about yourself.</li>
                  <li>See yourself as a whole person, not an imperfect body part.</li>
                  <li>Do something nice for your body, such as getting a massage or a haircut.</li>
                </ul>
              </p>
          </div>
        </div>
        <div class="rightcolumn">
          <div class="card">"When a child reaches puberty, parents become so curious about their sex lives and whereabouts, put them behind bars to their own detriment. When such a child breaks free, don't be surprised to see him/her in porn movies.<br>
          -Michael Bassey Johnson
          </div>
          <div class="card">
            <h2>About Me</h2>
            <div class="fakeimg" style="height:100px;">Image</div>
            <p>Some text about the author will be inserted here</p>
          </div>
          <div class="card">
            <h3>Popular Post</h3>
            <div class="fakeimg">Image</div><br> <!-- the image will be clickable and it will direct you to another article -->
            <div class="fakeimg">Image</div><br> 
            <div class="fakeimg">Image</div>
          </div>
          <div class="card">
            <h3>Follow Me</h3>
            <p>social media links can be inserted here</p>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
        <div class="footer-links">
            <div class="footer-link-wrapper">
            <div class="footer-link-items">
                <h2 class="footer-title">Help</h2>
                <a href="../faq.php" class="link footer-link">FAQ's</a>
                <a href="../report.php" class="link footer-link">Report</a>
            </div>
            <div class="footer-link-items">
                <h2 class="footer-title">About us</h2>
                <a href="../aboutus.php" class="link footer-link">About Us</a>  
                <a href="#" class="link footer-link">Blogs</a>
                <a href="#" class="link footer-link">Testimonials</a>
            </div>
            </div>
            <div class="footer-link-wrapper">
            <div class="footer-link-items">
                <h2 class="footer-title">Careers</h2>
                <a href="../writers.php" class="link footer-link">Writers</a>
                <a href="../contactus.php" class="link footer-link">Contact Us</a>
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
                <a href="../../../public/index.php" class="link" id="footer-logo">VOY</a>
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

    <script src="../../../public/js/main.js"></script>
  </body>
</html>