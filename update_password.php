<?php
// Establish database connection and retrieve current student data
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];

// Check if current password is correct
$phone = ""; // Replace with the current student's phone number
$sql = "SELECT * FROM students WHERE phone = '$phone' AND password = '$currentPassword'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Current password is correct, update the password
    $sql = "UPDATE students SET password = '$newPassword' WHERE phone = '$phone'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Password updated successfully!";
    } else {
        echo "Error updating password: " . $conn->error;
    }
} else {
    echo "Incorrect current password.";
}

$conn->close();
?>
