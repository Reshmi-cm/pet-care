<?php
$servername = "localhost";
$username = "root";
$password = ""; // Leave blank for XAMPP
$dbname = "pet_sitters_db"; // Change if your database name is different

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully!";
}
?>
