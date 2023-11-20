<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    // TODO: Validate and sanitize inputs (for a real-world scenario)

    // Insert new user into the 'users' table
    $query = "INSERT INTO users (username, name, password) VALUES ('$username', '$name', '$password')";
    $result = $conn->query($query);

    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// TODO: Redirect or display registration form on failure
?>
