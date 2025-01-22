<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host = 'smtp.zoho.com';  // Change to Zoho/Gmail SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'info@northhillssitters.pet'; // Your email
    $mail->Password = 'your_password'; // Use App Password for security
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email Data from Form
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pet_type = $_POST['pet_type'];
    $service_type = $_POST['service_type'];
    $notes = $_POST['notes'];

    // Recipient & Content
    $mail->setFrom('info@northhillssitters.pet', 'North Hills Sitters');
    $mail->addAddress('your-email@example.com'); // Change to your email
    $mail->isHTML(true);
    $mail->Subject = "New Appointment Request";
    $mail->Body = "
        <h2>New Appointment
