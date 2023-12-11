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
$mail->Username = 'selaginellabryopteris1234@gmail.com';           
$mail->Password = 'rcnvnpnlbczllmym';        

$email = $_SESSION['mail'];
$name = $_SESSION['name'];
                                   

$mail->setFrom('selaginellabryopteris1234@gmail.com', 'SELAGINELLA BRYOPTERIS');
$mail->addAddress($email, $name);
$mail->isHTML(true);
$mail->Subject = 'Registration Confirmation';
$mail->Body = 'Congratulations! Your booking has been made.!!';

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   echo 'Message has been sent';
}

$mail->smtpClose();
header("Location: home.php");
?>