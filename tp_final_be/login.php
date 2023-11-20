<?php
session_start();
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // TODO: Validate and sanitize inputs (for a real-world scenario)

    // Check if user exists
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php"); // Redirect to landing page
        exit();
    } else {
        echo "Invalid username or password";
    }
}

// TODO: Redirect or display login form on failure
?>
