<?php
include 'db_connect.php'; // Includes the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pet_type = $_POST['pet_type'];
    $service_type = $_POST['service_type'];
    $notes = $_POST['notes'];

    // Prepare SQL query
    $stmt = $conn->prepare("INSERT INTO appointments (first_name, last_name, email, phone, pet_type, service_type, notes) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $first_name, $last_name, $email, $phone, $pet_type, $service_type, $notes);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>
