<?php
    session_start();
    require('../controller/connection.inc.php');

    $uname = $_SESSION["username"];
    $uid = $_SESSION["userid"];
    
    $profiledata = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM User WHERE `UserID` = $uid;"));

    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM image WHERE username = '$uname'"));
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/styles/index.css">
    <link rel="stylesheet" href="../../public/styles/main.css">
    <link rel="stylesheet" href="../../public/styles/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Profile Page </title>
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
        //   session_start();
          if(isset($_SESSION["userid"])) {
            echo "<li class=\"navbar-menu-item\">";
            // echo "<a href='../application/view/login.php'>Bookmarks</a>";
            // echo "<a href='../application/view/login.php' class='navbar-link link'>";
            // echo "<i class='fa-solid fa-bookmark'></i>";
            // echo "<span>Favorites</span>";
            // echo "</a>";
            echo "</li>";
            echo "<li id='nav-button-dynamic' class='navbar-menu-item navbar-btn'>"; 
            // echo "<a href='../application/view/profile.php'>Signin</a>";
            echo "<a href='./editProfile.php' class='btn-link link'>Edit Profile</a>"; 
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

    <form class ="form" id = "form" action = "" enctype = "multipart/form-data" method = "post">
        <div class= "upload" style="margin-top: 2rem; margin-bottom: 2rem">
            <?php
            $id = $user["id"];
            $name = $user["username"];
            $image = $user["image"];
            $_SESSION["userprofileimg"] = $image;
            ?>
        <img src="../../public/images/uploads/<?php echo $image; ?>" width = 125 height = 125 title="<?php echo $image; ?>">
        <div class = "round">
            <input type= "hidden" name= "id" value="<?php echo $id; ?>">
            <input type= "hidden" name= "id" value="<?php echo $name; ?>">
            <input type= "file" name= "image" id= "image" accept=".jpg, .jpeg, .png">
            <i class = "fa fa-camera" style = "color: #fff"> </i>
        </div>
        </div>
        <?php 
            $fullname = $profiledata['FirstName'] . " ". $profiledata['LastName'];
            $username = $profiledata['UserName'];
            $email = $profiledata['Email'];
            $writer;
            if($profiledata['IsWriter'] == 0) {
                $writer = "Not Granted";
            } else if($profiledata['IsWriter'] == 1) {
                $writer = "Granted";
            }
            echo "
            <div class='card mb-4' style='marg'>
              <div class='card-body text-center' style='width: 60%; margin-left: 25rem'>
                <div class='row'>
                  <div class='col-sm-3'>
                    <p class='mb-0'>Full Name</p>
                  </div>
                  <div class='col-sm-9'>
                    <p class='text-muted mb-0'>$fullname</p>
                  </div>
                </div>
                <hr>
                <div class='row'>
                  <div class='col-sm-3'>
                    <p class='mb-0'>Username</p>
                  </div>
                  <div class='col-sm-9'>
                    <p class='text-muted mb-0'>$username</p>
                  </div>
                </div>
                <hr>
                <div class='row'>
                  <div class='col-sm-3'>
                    <p class='mb-0'>Email</p>
                  </div>
                  <div class='col-sm-9'>
                    <p class='text-muted mb-0'>$email</p>
                  </div>
                </div>
                <hr>
                <div class='row'>
                  <div class='col-sm-3'>
                    <p class='mb-0'>Writer privilege </p>
                  </div>
                  <div class='col-sm-9'>
                    <p class='text-muted mb-0'>$writer</p>
                  </div>
                </div>
                </div>
              </div>
            ";
        ?>
    </form>
    <script type = "text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById('form').submit();
      }
    </script>
    <?php
    if (isset($_FILES["image"]["name"])){
        $id = $_POST["id"];
        // $name = $_POST["names"];

        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        // Image Validation
        $validImageExtension = ['jpg', 'jpeg', 'png' ];
        $imageExtension = explode('.', $imageName);
        $imageExtension = strtolower (end($imageExtension));
        if (!in_array ($imageExtension, $validImageExtension)){
            echo 
            "
            <script>
                alert('Invalid Image Extension');
                doucment.location.href= '../profile.php';
            </script>    
            ";
        } elseif ($imageSize > 10000000){
            echo 
            "
            <script>
                alert('Image size is too large');
                doucment.location.href= '../profile.php';
            </script>    
            ";
        } else {
            $newImageName = $name . " - ". date("Y.m.d"). " - " . date("h.i.sa");
            $newImageName .= "." . $imageExtension;
            $query = "UPDATE image SET image = '$newImageName' WHERE username = '$uname' ";
            mysqli_query($conn, $query);
            move_uploaded_file($tmpName, '../../public/images/uploads/' . $newImageName);
            echo
            "
            <script>
                doucment.location.href= '../profile.php';
            </script>
            ";
        }
        
    }
    ?>

    <?php  include './components/footer.php' ?>
            
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../../public/js/main.js"></script>

  </body>
</html>