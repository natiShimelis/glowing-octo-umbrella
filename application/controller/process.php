<?php

if (isset($_POST['submit_data'])) {
    session_start();
    require_once('./connection.inc.php');
    require_once('../utils/login.utils.php');
    $title = mysqli_real_escape_string($conn, $_POST['Article_title']);
    $content = mysqli_real_escape_string($conn, $_POST['Article_content']);
    $catag = mysqli_real_escape_string($conn, $_POST['Category']);
    $author = $_SESSION['username'];
    $uid = $_SESSION["userid"];
    
    if ((!empty($title) || !empty($content))&& !isset($_POST['anonymous'])) {
        $query = "INSERT INTO submittions (Article_title, Article_content, Category, Author, UserId) VALUES('$title', '$content', 
        '$catag', '$author', '$uid');";
        $execute = mysqli_query($conn, $query);
        print_r(mysqli_error($conn));
        if (!$execute) {
            echo "Failed to submit data";
            exit();
        }else{
            header('refresh:5; url = ../view/Article.php');
            echo "Article Published Sucessfully";
            exit();
        }
    }elseif((!empty($title) || !empty($content))&& isset($_POST['anonymous'])){
        $query = "INSERT INTO submittions (Article_title, Article_content, Category, Author, UserId) VALUES('$title', '$content', 
        '$catag', 'Anonymous', '72');";
        $execute = mysqli_query($conn, $query);
        print_r(mysqli_error($conn));
        if (!$execute) {
            echo "Failed to submit data";
            exit();
        }else{
            header('refresh:5; url = ../view/Article.php');
            echo "Article Published Sucessfully";
            exit();
        }
    }else{
        header('Location: ../view/Article.php?emptyFields');
        exit();
    }
}else{
    header('Location: ../view/Article.php?invalidRequest');
    exit();
}
?>