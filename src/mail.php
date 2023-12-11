<?php
require("connection.php");
session_start();

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer;

$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';                     
$mail->SMTPAuth = true;  
$mail->SMTPSecure = 'tls';                            
$mail->Port = 587;                             
$mail->Username = 'noreply.houseoffur@gmail.com';           
$mail->Password = 'lvojorlejwzrvfci';        

$email = $_SESSION['email'];
$name = $_SESSION['name'];
                                   

$mail->setFrom('noreply.houseoffur@gmail.com', 'House OF Fur');
$mail->addAddress($email, $name);
$mail->isHTML(true);
$mail->Subject = 'Registration Confirmation';
$mail->Body = 'Congratulations! You have been registered successfully on House Of Fur!!';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo 'Message has been sent';
}

$mail->smtpClose();
header("Location: logout.php");
?>