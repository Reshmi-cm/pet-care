<?php
// Database Connection File

$servername = "localhost"; // Change if using a remote server
$username = "root"; // Default MySQL username (change if needed)
$password = ""; // Default password is empty in XAMPP/WAMP
$dbname = "pet_sitters_db"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
