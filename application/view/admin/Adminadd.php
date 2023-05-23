<?php
include('run.php');

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
   

    // $email_query = "SELECT * FROM Adregister WHERE email='$email' ";

    // $query = "INSERT INTO adregister (username,email,password) VALUES ('$username','$email','$password')";
    //         $query_run = mysqli_query($connection, $query);

    // $query_run = mysqli_query($connection, $query);
    
    // if(mysqli_num_rows($query_run) > 0)
    // {
    //     $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
    //     $_SESSION['status_code'] = "error";
    //     header('Location: /register.php');  
    // }
    // else
    // {
        if($password === $cpassword)
        {
            $query = "INSERT INTO adregister (username, email, password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                // $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
               $_SESSION['status'] = "Admin Profile Not Added";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            // $_SESSION['status_code'] = "warning";
            header('Location: /register.php');  
        }
    }

// }


