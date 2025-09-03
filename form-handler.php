<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nadakhater97@gmail.com';  
        $mail->Password = 'urvq qyya ajzt vcwu';  
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('nadakhater97@gmail.com', 'Website Contact Form');
        $mail->addAddress('nalaa3662@gmail.com'); 

        $mail->isHTML(true);
        $mail->Subject = 'New Form Submission';
        $mail->Body    = "
            <b>User Name:</b> $name <br>
            <b>User Email:</b> $visitor_email <br>
            <b>Subject:</b> $subject <br>
            <b>Message:</b> $message
        ";

        $mail->send();
        header("Location: contact.html");
    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}";
    }
}
?>
