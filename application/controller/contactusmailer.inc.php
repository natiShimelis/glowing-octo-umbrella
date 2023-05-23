<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST["contactus"])) {
//Load Composer's autoloader
require '../../vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings

    $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure= 'tls';
    $mail->Port = 587;
    $mail->Username = 'voiceofyouth.ethiopia@gmail.com';
    $mail->Password = 'unibvsdjninifcym';

    //Recipients
    $mail->setFrom('voiceofyouth.ethiopia@yahoo.com', 'Voice of Youth');
   
        $mail->addAddress( 'mahletalmi@gmail.com','Mahlet Tizazu');     //Add a recipient
    
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Information About the website';

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail->Body    ='<div style="border:2px solid red;">
                        <p>from ' . $name . 'at ' . $email . ' messaged</p>
                        <p> ' . $message . '</p></div>';
    $mail->AltBody = $message;

   if(!$mail->send()){
    echo 'Messege could not be sent.';
    echo 'Mailer Error: '.$mail->ErrorInfo;
   }else {
    echo 'Message has been sent';
    header("Refresh:3; url = ../../");
   }
   
}
