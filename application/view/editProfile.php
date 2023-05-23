<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/styles/index.css">
    <link rel="stylesheet" href="../../public/styles/main.css">

    <!-- JavaScript Bundle with Popper -->
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            echo "<a href='./profile.php' class='btn-link link'>Profile</a>"; 
            echo "</li>";
          }
        ?>    
      </ul>
    </div>
  </nav>

    <div style="margin: 4rem 0; ">
        <div class="container">
            <div class=".col-xs-4 .col-md-offset-2">
                <div class="panel panel-default panel-info Profile">
                    <div class="panel-heading"> <b>My Profile</b> </div>
                        <?php
                            if(isset($_GET["error"])) {
                                if($_GET["error"] == "none") {
                                    echo "<div class='alert alert-success'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                    echo "<strong>Success!</strong> Profile successfully saved";
                                    echo "</div>";
                                } else if($_GET["error"] == "profilenotsaved") {
                                    echo "<div class='alert alert-warning'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                    echo "<strong>Oops!</strong> Profile not saved. try again";
                                    echo "</div>";
                                }
                            } 
                        ?>
                    <div class="panel-body">
                        <div class="form-horizontal">
                            <form action="../controller/profile.inc.php" method="POST" enctype= "multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">First Name</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" name="FirstName"
                                        placeholder="First Name" ng-model="me.firstName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Last Name</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" name="LastName"
                                        placeholder="Last Name" ng-model="me.lastName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" name="Email"
                                        placeholder="Email" ng-model="me.email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">User Name</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="text" name="UserName"
                                        placeholder="Username" ng-model="me.userName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" type="password" name="Password"
                                        placeholder="Password" ng-model="me.email">
                                    </div>
                                </div>
                        </br>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary" name="update" >Update my Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>  <!-- end form-horizontal -->
                    </div> <!-- end panel-body -->        
                </div> <!-- end panel -->
            </div> <!-- end size -->
        </div> <!-- end container-fluid -->
    </div>
                
    <?php  include './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../../public/js/main.js"></script>
</body>
</html>