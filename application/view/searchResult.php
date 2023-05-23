<?php 
session_start();
include '../controller/connection.inc.php';
?> 

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../../public/styles/searchresult.css">
  <link rel="stylesheet" href="../../public/styles/main.css">
  <title>Search page</title>

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
        <!-- <li class="search-menu-item">
          <form action="../application/view/searchResult.php" method="POST">
            <div class='searchContainer'>
              <button class='iconButton' name="submit-search">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
              <input name="search" class='searchInput' placeholder='articles keyword' />
            </div>
          </form>
        </li> -->
        <?php
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
  


<div class="blog-container">
  <div class="uwelcome">
    <h1 id="welcome"> welcome to the Search page</h1>
  </div>
  <div class="search-sort">
    <div class="filter_section">
      <div class="sorting">
    <form  method="POST" action="searchResult.php" name="sorting">
           <label for="blog">   &nbsp; &nbsp; Sort by: </label>
                    <select class="form-control" name="blog">
                    <option value="">none</option>
                    <option value="blogName">Title</option>
                    <option value="Content">Article content</option>
                    <option value=" blogName desc">Title desc</option>               
                </select>
                <input value="Sort" class="sort-button" name="sort" type="submit">
        </form>
</div>
              <form role="filter" method="POST" action="searchResult.php" name="filter">
              
                  <h6><strong>Writers List</strong></h6>
                  <hr>
              <?php
              $querylist="SELECT*FROM user where IsWriter=1";
              $writerquery=mysqli_query($conn,$querylist);
              if(mysqli_num_rows($writerquery)>0)
          {
                  foreach($writerquery as $writerlist)
              {

                  $checked=[];
                  if(isset($_POST['user'])){
                      $checked=$_POST['user'];
                  }
                  ?>
                      <div>   
                      <input type="checkbox" name="writers[]" value="<?=$writerlist['UserID'];?>"
                          <?php if(in_array($writerlist['UserID'],$checked)) { echo "checked"; }?>
                      />
                          <?=$writerlist['UserName'];?>
                      </div>
                  <?php
              }
          }
              else
              {
                  echo "No writers found";
              }
              ?>
              <h5><button name="filter_search" type="submit"><strong> Filter:</strong></button></h5>
              </form>
      </div>  
     
      <div class="search-section">
            <h2>Searched Blogs </h2>
            <?php
        
        if(isset($_POST['filter_search']))

        {   $search="";
          $search=$_SESSION['srch'];
            $writerchecked=[];
            $writerchecked=$_POST['writers'];
            $filterd="SELECT*FROM blog WHERE (blogName lIKE '%$search%' OR Content lIKE '%$search%') AND UserID IN(";
            foreach($writerchecked as $rowUser)
            {
                $filterd.="'$rowUser',";
                
              }
              $filterd.="'$rowUser')";
              


              $filt_run=(mysqli_query($conn,$filterd));
              $queryResult=mysqli_num_rows($filt_run);
              if($queryResult>0){
                while($row=mysqli_fetch_assoc($filt_run)){
                  echo "<a href='articles/article.php?title=".$row['blogName']."&date=".$row['createdAt']."'>
                    <div class='blog-box'>
                  <h3>".$row['blogName']."</h3>
                  <p>".$row['createdAt']."</p>
                    
                  </div></a>";
                }
                }else{
                  echo "There are no results matching your search! ";
                }
        }

    ?> 
            <?php
           
           //if(isset($_POST['submit-search']))
 // { 
             $sort="";
           
           
                                                                                                
            if(isset($_POST['search'])){
              $search=$_POST['search'];
                
              $search=mysqli_real_escape_string($conn,$_POST['search']);
              echo "result for ".$search;
              $_SESSION['srch']= $search;
             
              $sql="SELECT
              b.blogName,
              b.Content,
              b.createdAt,
              u.UserName
              FROM blog b
              INNER JOIN user u
              ON u.UserID = b.UserID
              WHERE (b.blogName lIKE '%$search%' OR b.Content lIKE '%$search%') $sort";
              $result=mysqli_query($conn, $sql);
            $queryResult=mysqli_num_rows($result);
            if($queryResult>0){
            while($row=mysqli_fetch_assoc($result)){
              echo "<a href='articles/article.php?title=".$row['blogName']."&date=".$row['createdAt']."'>
                <div class='blog-box'>
              <h3>".$row['blogName']."</h3>
              <p>".$row['createdAt']."</p>
              <p>".$row['UserName']."</p>

              </div></a>";
            }
            }
          }
          
                if(isset($_POST['sort']))
                {
                 $search="";
                 $search=$_SESSION['srch'];
                 echo "result for ".$search;
                  if($_POST['blog']!="")
                  {
                    $sort="ORDER BY ".$_POST['blog'];
                  }
                  $sql="SELECT
                  b.blogName,
                  b.Content,
                  b.createdAt,
                  u.UserName
                  FROM blog b
                  INNER JOIN user u
                  ON u.UserID = b.UserID
                  WHERE (b.blogName lIKE '%$search%' OR b.Content lIKE '%$search%') $sort";
                  $result=mysqli_query($conn, $sql);
                $queryResult=mysqli_num_rows($result);
                if($queryResult>0){
                while($row=mysqli_fetch_assoc($result)){
                  echo "<a href='articles/article.php?title=".$row['blogName']."&date=".$row['createdAt']."'>
                    <div class='blog-box'>
                  <h3>".$row['blogName']."</h3>
                  <p>".$row['createdAt']."</p>
                  <p>".$row['UserName']."</p>
  
                  </div></a>";}}
                  
                }
                
              

               //}
          ?>
      
    </div>
      </div>
</div>
<footer class="footer">
    <div class="footer-container">
      <div class="footer-links">
        <div class="footer-link-wrapper">
          <div class="footer-link-items">
            <h2 class="footer-title">Help</h2>
            <a href="faq.php" class="link footer-link">FAQ's</a>
            <a href="report.php" class="link footer-link">Report</a>
            <a href="#" class="link footer-link">How it works</a>
          </div>
          <div class="footer-link-items">
            <h2 class="footer-title">About us</h2>
            <a href="aboutus.php" class="link footer-link">About Us</a>  
            <a href="#" class="link footer-link">Blogs</a>
            <a href="#" class="link footer-link">Testimonials</a>
            <a href="contactus.php" class="link footer-link">Contact Us</a>
          </div>
        </div>
        <div class="footer-link-wrapper">
          <div class="footer-link-items">
            <h2 class="footer-title">Services</h2>
            <a href="writers.php" class="link footer-link">Authoring</a>
            
            
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
            <a href="../../public/index.php"  class="link" id="footer-logo">VOY</a>
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