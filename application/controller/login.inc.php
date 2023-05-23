<?php 
    if(isset($_POST["login"])) {
        $email =$_POST['email'];
        $password =$_POST['password'];
        
        require('connection.inc.php');
        require('../utils/login.utils.php');
        
        if(emptyInputLogin($email, $password) !== false ) {
            header("location: ../view/login.php?error=emptyinput");
            exit();
        } 

        loginUser($conn, $email, $password);
        mysqli_close($db);
    } else {
        header("location: ../view/login.php");
    }
