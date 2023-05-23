<?php
    function generateReport($conn, $startDate, $endDate) {    
        $sql= "SELECT * FROM `blog` WHERE `createdAt` BETWEEN ? AND ?;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../view/login.php?error=profilenotsaved");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss" , $startDate, $endDate);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_get_result($stmt);

    }