<?php
    function emptyInputSignup($name, $email, $username, $password, $passwordrpt) {
        if(empty($name) || empty($email) || empty($username) || empty($password) || empty($passwordrpt)) {
            return true; 
        } else { return false; }
    }


    function invalidUserName($username) {
        if(!preg_match("/^[a-zA-z0-9]*$/", $username)) {
            return true;
        } else { return false; }
    }

    function validatePassword($password) {
        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,25}$/", $password)) {
            return true;
        } else { return false; }
    }

    function invalidEmail($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else { return false; }
    }

    function invalidPasswordRepeat($password, $passwordrpt) {
        if($password !== $passwordrpt) {
            return true;
        } else { return false; }
    }

    function duplicateFileExists($conn, $username, $email) {
        $sql = "SELECT * FROM User WHERE `UserName` = ? OR `Email` = ?;";
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            return false;
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)) {
            return $row;
        } else { return false; }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $username, $fullname, $password, $email) {
        
        $sql = "INSERT INTO `user` ( `FirstName`, `LastName`, `UserName`, `Email`, `Password`) VALUES ( ?, ?, ?, ?, ?);";
        
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            return false;
        }

        $sql2= "INSERT INTO `image` ( `username`, `image`) VALUES ('$username', 'default_profile.png');";
        mysqli_query($conn, $sql2);
        
        $name = explode(" ",$fullname);
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $name[0], $name[1], $username, $email, $hashedpwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        session_start();
        $_SESSION["userprofileimg"] = "default_profile.png"; 
    }