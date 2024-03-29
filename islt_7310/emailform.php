<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format";
      exit;
    }

    // prepare email
    $to = 'alexreddy12@gmail.com';
    $subject = "New Contact Form Submission: ".$subject;
    $body = "You have received a new message from your contact form.\n\n"."Here are the details:\n\nName: ".$first_name." ".$last_name."\n\nEmail: ".$email."\n\nMessage:\n".$message;

    // send email
    if(mail($to, $subject, $body)){
        echo "Message Sent!";
    } else {
        echo "Failed to Send!";
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>