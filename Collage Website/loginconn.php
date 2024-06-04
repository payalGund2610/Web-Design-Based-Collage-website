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

// SQL query to fetch sign-in data
$sql = "SELECT * FROM login WHERE email = ? AND pass = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);

// Set username and password values
$username = $_POST['username'];
$password = $_POST['password'];

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if there is any result

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        // Process fetched data
        echo "Username: " . $row["email"] . " - Password: " . $row["pass"];
        header("location:MainPage.html");
    }
} 
else {
    header("location:backtologin.html");
}

// Close the connection
$stmt->close();
$conn->close();
?>