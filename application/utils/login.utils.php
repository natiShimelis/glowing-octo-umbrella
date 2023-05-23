<?php
    function emptyInputLogin($email, $password) {
        if(empty($email) || empty($password)) {
            return true; 
        } else { return false; }
    }

    function checkFileExists($conn, $email) {
        $sql = "SELECT * FROM User WHERE `Email` = ?;";
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            return false;
        }

        mysqli_stmt_bind_param($stmt, "s" , $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

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