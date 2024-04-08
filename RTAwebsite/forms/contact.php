<?php
$fname = $_POST['fname'];
$email = $_POST['email'];
$subjects = $_POST['subjects'];
$messages = $_POST['messages'];

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "contact2";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Insert form data into database
$sql = "INSERT INTO contact2(fname, email, subjects, messages) VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $fname, $email, $subjects, $messages);

if ($stmt->execute()) {
    echo "Record saved successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
