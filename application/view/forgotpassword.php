<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<html>
    <head>
    <link rel="stylesheet" href="../../public/styles/main.css">
        <title>Password Recovery using PHP and MySQL</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>

    <nav class="navbar">
    <div class="navbar-container">
      <a href="../../public/index.php" class="link" id="navbar-logo">VOY</a>
      
      <div class="navbar-hamburger" id="mobile-bar-icon">
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
        <span class="hamburger-bar"></span>
      </div>
      
    </div>
  </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    <h2>Forgot Password</h2>   

                    <?php
                    include('../controller/connection.inc.php');
                    if (isset($_POST["email"]) && (!empty($_POST["email"]))) {
                        $email = $_POST["email"];
                        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                        if (!$email) {
                            $error .="Invalid email address";
                        } else {
                            $sel_query = "SELECT * FROM User WHERE `Email` = '" . $email . "'";
                            $results = mysqli_query($conn, $sel_query);
                            $row = mysqli_num_rows($results);
                            if ($row == "") {
                                $error .= "User Not Found";
                            }
                        }
                        if ($error != "") {
                            echo $error;
                        } else {

                            $output = '';

                            $expFormat = mktime(date("H"), date("i"), date("s"), date("m"), date("d") + 1, date("Y"));
                            $expDate = date("Y-m-d H:i:s", $expFormat);
                            $key = md5(time());
                            $addKey = substr(md5(uniqid(rand(), 1)), 3, 10);
                            $key = $key . $addKey;
                            // Insert Temp Table
                            mysqli_query($conn, "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('" . $email . "', '" . $key . "', '" . $expDate . "');");


                            $output.='<p>Please click on the following link to reset your password.</p>';
                            //replace the site url
                            $output.='<p><a href="http://localhost/voy-v2/application/view/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset" target="_blank">http://localhost/voy-v2/application/view/reset-password.php?key=' . $key . '&email=' . $email . '&action=reset</a></p>';
                            $body = $output;
                            $subject = "Password Recovery";

                            $email_to = $email;


                            //autoload the PHPMailer
                            require("../../vendor/autoload.php");  
                            
                            $mail = new PHPMailer(true);
                            
                            try {

                                $mail->isSMTP();
                                $mail->SMTPDebug = 0;
                                $mail->Debugoutput = 'html';
                                $mail->Host = 'smtp.gmail.com';
                                $mail->SMTPAuth = true;
                                $mail->SMTPSecure= 'tls';
                                $mail->Port = 587;
                                $mail->Username = 'voiceofyouth.ethiopia@gmail.com';
                                $mail->Password = 'unibvsdjninifcym';
                                
                                // Recipient
                                $mail->setFrom('voiceofyouth.ethiopia@yahoo.com', 'Voice of Youth');
                                $mail->AddAddress($email_to);


                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = $subject;
                                $mail->Body = $body;

                                $mail->Send();
                                echo "An email has been sent";
                            } catch(Exception $e) {                             
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                        }
                    }
                    ?>
                    <form method="post" action="" name="reset">
                        

                        <div class="form-group">
                           <label><strong>Enter Your Email Address:</strong></label>
                            <input type="email" name="email" placeholder="username@email.com" class="form-control"/>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="reset" value="Reset Password"  class="btn btn-primary"/>
                        </div>
                    </form>

                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>