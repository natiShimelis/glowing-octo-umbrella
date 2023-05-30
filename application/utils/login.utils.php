<?php
    function emptyInputLogin($email, $password) {
        if(empty($email) || empty($password)) {
            return true; 
        } else { return false; }
    }

    function checkFileExists($conn, $email) {
        $sql = "SELECT * FROM User WHERE `Email` = '$email'";

        $result = mysqli_query($conn,$sql);

        if($row = mysqli_fetch_assoc($result)) {
            return $row;
        } else { return false; }

        mysqli_stmt_close($stmt);
    }

    function loginUser($conn, $email, $password) {
        $udExists = checkFileExists($conn, $email);
        
        if(!$udExists) {
            header("location: ../view/login.php?error=userdoesntexist");
            exit();
        }
            
        $hashedpwd = $udExists["Password"];

        $isPasswordVerified = password_verify($password, $hashedpwd);

        if(!$isPasswordVerified) {
            header("location: ../view/login.php?error=wrongpassword");
            exit();
        } else if($isPasswordVerified) {
            session_start();
            $_SESSION["userid"] = $udExists["UserID"];
            $_SESSION["email"] = $udExists["Email"];
            $_SESSION["username"] = $udExists["UserName"];
            $_SESSION["IsWriter"] = $udExists["IsWriter"];
            
            $username = $udExists["UserName"];

            $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM image WHERE username = '$username'"));
            $_SESSION["userprofileimg"] = $image;

            header("location: ../../index.php");
        }
    }