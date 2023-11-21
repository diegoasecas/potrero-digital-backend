<?php
// Database credentials
$servername = "127.0.0.1";
$username = "root";
$password = "databased69";
$database = "tp_final_be";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check if the query was successful
if ($result !== false) {
    // Check if there are users
    if ($result->num_rows > 0) {
        // Loop through each user
        while ($user = $result->fetch_assoc()) {
            // Display user properties
            echo "<h2>User ID: {$user['id']}</h2>";
            echo "<p>Username: {$user['username']}</p>";
            echo "<p>Name: {$user['name']}</p>";
            echo "<p>Password: {$user['password']}</p>";
            echo "<p>Admin: {$user['admin']}</p>";
            echo "<hr>";
        }
    } else {
        echo "No users found.";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

// Close connection
$conn->close();
?>