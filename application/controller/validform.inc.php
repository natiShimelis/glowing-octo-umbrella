<?php
$serverName = 'localhost';
$adminUserName = 'root';
$adminPassword = '';
$databaseName = 'voy';
session_start();

$db = mysqli_connect($serverName, $adminUserName, $adminPassword, $databaseName);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// if($_SESSION['email']) {
//     header("Location: http://localhost/voy/index.html");
// }

echo "Connected Successfully";



// if(isset($_POST["req_user"])){
$why = $_POST['why'];
$fullname = $_POST["fullname"];
$userId = $_SESSION['UserID'];



$target_dir = "../uploads/";
$target_file = $target_dir . $fullname .basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    /* $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    } */
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$query = $sql = "INSERT INTO `validform` ( `FullName`, `Why`, `CV`, `UserId`) VALUES ( '$fullname', '$why', '$target_file', '$userId')";

if ($result = mysqli_query($db, $query)) {
    header("Location: http://localhost/voy/src/views/submitted.html");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($db);
