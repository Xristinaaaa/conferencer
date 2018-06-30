<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();    
    $mail->SMTPSecure = 'tls'; // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'eventsys.sup@gmail.com';                 // SMTP username
    $mail->Password = 'ninjas123456';                           // SMTP password
    $mail->Port = 25;                                    // TCP port to connect to
    
    //From email address and name
    $mail->setFrom($_POST['email'], $_POST['name']);

    //Recipients
    $mail->addAddress('eventsys.sup@gmail.com');         
    $mail->addReplyTo($_POST['email']);

    //Content                             
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];

    $mail->send();
    header('Location: ../../index.php?message=success#contact');
} catch (Exception $e) {
    header('Location: ../../index.php?message=failure#contact');
    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>