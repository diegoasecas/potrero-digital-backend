<?php

// intercambia credenciales con la ddbb
$servername = "127.0.0.1";
$username = "root";
$password = "databased69";
$database = "tp_final_be";

// crea conexion
$conn = new mysqli($servername, $username, $password, $database);

// chekea conexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// db_connection.php

// Check if the provided credentials are valid
$result = $conn->query("SELECT * FROM users WHERE username = '$username'");

// Check if the query was successful
if ($result !== false) {
    // Check if the provided credentials are valid
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Check if the user is an admin
            $_SESSION['is_admin'] = $user['admin'] == 1;

            // Redirect to the main page
            header("Location: index.php");
            exit();
        } else {
            // Invalid password
            $login_error = "Invalid username or password";
        }
    } else {
        // User not found
        $login_error = "Invalid username or password";
    }
} else {
    // Query was not successful
    $login_error = "Error executing query";
}
