<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $pet_type = htmlspecialchars($_POST["pet_type"]);
    $service_type = htmlspecialchars($_POST["service_type"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "reshmibrosnan@gmail.com"; // Replace with your email
    $subject = "New Appointment Booking from $first_name $last_name";
    
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $email_body = "
        <h2>New Appointment Request</h2>
        <p><strong>Name:</strong> $first_name $last_name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Pet Type:</strong> $pet_type</p>
        <p><strong>Service Type:</strong> $service_type</p>
        <p><strong>Message:</strong> $message</p>
    ";

    if (mail($to, $subject, $email_body, $headers)) {
        echo "Success! Your appointment request has been sent.";
    } else {
        echo "Error! Unable to send appointment request.";
    }
}
?>
