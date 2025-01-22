<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $pet_type = htmlspecialchars($_POST["pet_type"]);
    $service_type = htmlspecialchars($_POST["service_type"]);
    $notes = htmlspecialchars($_POST["notes"]);

    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use your email provider's SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'northhillspetsitters@gmail.com'; // Your email
        $mail->Password = 'zlxi xagx gocc iljo'; // Use App Passwords for Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('your-email@gmail.com', 'North Hills Sitters');
        $mail->addAddress('northhillspetsitters@gmail.com'); // Your email

        $mail->isHTML(true);
        $mail->Subject = "New Appointment Request";
        $mail->Body = "
            <h2>New Appointment Request</h2>
            <p><strong>Name:</strong> $first_name $last_name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Pet Type:</strong> $pet_type</p>
            <p><strong>Service Type:</strong> $service_type</p>
            <p><strong>Notes:</strong> $notes</p>
        ";

        $mail->send();
        echo "Success! Your appointment request has been sent.";
    } catch (Exception $e) {
        echo "Error: " . $mail->ErrorInfo;
    }
}
?>

