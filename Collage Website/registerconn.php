<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "studentInfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL query to insert user data
    $sql = "INSERT INTO login VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param( "sss",$username, $email, $password);

    // Execute the query
    if ($stmt->execute() === TRUE) {
        header("location:accountCreated.html");
    } else {
        header("location:backtologin.html");
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>