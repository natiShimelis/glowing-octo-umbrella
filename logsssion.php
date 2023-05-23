<?php
session_start();
include('application/controller/connection.inc.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/connection.php");
}

if(!$_SESSION['username'])
{
    header('Location: application/view/login.php');
}
?>