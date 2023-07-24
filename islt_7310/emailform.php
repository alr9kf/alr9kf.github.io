<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // prepare email
    $to = 'alexreddy12@gmail.com';
    $subject = "New Contact Form Submission: ".$subject;
    $body = "You have received a new message from your contact form.\n\n"."Here are the details:\n\nName: ".$first_name." ".$last_name."\n\nEmail: ".$email."\n\nMessage:\n".$message;

    // send email
    if(mail($to, $subject, $body)){
        echo "Message Sent!";
    }else{
        echo "Failed to Send!";
    }
}
?>