<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\Users\alexr\OneDrive\Desktop\alr9kf.github.io-main\islt_7310'; // adjust this to your path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
      exit;
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.office365.com';  
        $mail->SMTPAuth = true;                               
        $mail->Username = 'alr9kf@umsystem.edu'; // Replace with your Outlook email
        $mail->Password = 'Justified122!122'; // Replace with your Outlook password
        $mail->SMTPSecure = 'tls';                            
        $mail->Port = 587;                                    

        //Recipients
        $mail->setFrom('alr9kf@umsystem.edu', 'Alex Reddy'); // Replace with your Outlook email and your name
        $mail->addAddress('alr9kf@umsystem.edu', 'Alex Reddy'); 

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = "New Contact Form Submission: " . $subject;
        $mail->Body    = "You have received a new message from your contact form.\n\n"."Here are the details:\n\nName: ".$first_name." ".$last_name."\n\nEmail: ".$email."\n\nMessage:\n".$message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>
