<?php  

  $username =$_POST['userName'];
  $fullname =$_POST['fullName'];
  $password =$_POST['password'];
  $passwordrpt = $_POST['confirmPassword'];
  $email =$_POST['email'];

  if(isset($_POST["signup"])) {
    require('connection.inc.php');
    require('../utils/signup.utils.php');

    if(emptyInputSignup($fullname, $email, $username, $password, $passwordrpt) !== false ) {
      header("location: ../view/signup.php?error=emptyinput");
      exit();
    } 

    if(invalidUserName($username) !== false) {
      header("location: ../view/signup.php?error=invalidusername");
      exit();
    }

    if(invalidEmail($email) !== false) {
      header("location: ../view/signup.php?error=invalidemail");
      exit();
    }

    if(validatePassword($password) !== false) {
      header("location: ../view/signup.php?error=invalidpassword");
      exit();
    }

    if(invalidPasswordRepeat($password, $passwordrpt) !== false) {
      header("location: ../view/signup.php?error=passwordsdontmatch");
      exit();
    }

    if(duplicateFileExists($conn, $username, $email) !== false) {
      header("location: ../view/signup.php?error=dataalreadyexists");
      exit();
    }
    
    createUser($conn, $username, $fullname, $password, $email);
    // session_start();
    $_SESSION["useremail"] = $email;
    $_SESSION["userfullname"] = $fullname;
    $_SESSION["username"] = $username;
    include("signupmailer.inc.php");

    mysqli_close($conn);
  } else {
    header("location: ../view/signup.php");
  }

  header("Location: ../../index.php");