<?php
    function updateUser($conn, $email, $password, $username, $FirstName, $LastName) {
        $sql = "UPDATE `user` SET `FirstName`= ? , `LastName`= ?, `UserName`= ? , `Email`= ? , `Password`= ? WHERE `user`.`UserID`= ?;";
        $userID;

        if(isset($_SESSION["userid"])) {
            $userID = $_SESSION["userid"];
        }

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../view/login.php?error=profilenotsaved");
            exit();
        }
        
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssssi", $FirstName, $LastName, $username, $email, $hashedpwd, $userID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }