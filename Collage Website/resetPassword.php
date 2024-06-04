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

// Set username and password values
$email = $_POST['email'];
$password = $_POST['password'];


$sql1 = "SELECT * FROM login WHERE email = ?";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("s", $email, );
// Execute the query
$stmt1->execute();

// Get the result
$result = $stmt1->get_result();

// Check if there is any result


if ($result->num_rows > 0) {
    // Process fetched data
    // SQL query to fetch sign-in data
    $sql = "UPDATE login SET pass = ? WHERE  email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $password,$email);
    $stmt->execute();
    header("location:passwordReset.html");

} else {
    header("location:backtologin.html");
}

// Close the connection
// $stmt->close();  
$stmt1->close();
$conn->close();
?>