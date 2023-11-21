<?php
session_start();
require_once('db_connection.php');

// Debugging: Display session information
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Marketplace</title>

</head>
<body>

<?php
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, display a greeting
    echo '<h2>Welcome, ' . $_SESSION['name'] . '!</h2>';
    echo '<a href="logout.php">Log out</a>';
    echo '<p>Here are your items:</p>';

    // Display items uploaded by the user
    $uploader = $_SESSION['user_id'];
    $user_items_query = "SELECT * FROM products WHERE uploader = '$uploader'";
    $user_items_result = $conn->query($user_items_query);

    if ($user_items_result->num_rows > 0) {
        while ($row = $user_items_result->fetch_assoc()) {
            echo '<div>';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>Category: ' . $row['category'] . '</p>';
            echo '<p>Description: ' . $row['descr'] . '</p>';
            echo '<p>Price: $' . $row['price'] . '</p>';
            echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '" style="max-width: 200px; max-height: 200px;">'; // Display image
            echo '<a href="item_detail.php?id=' . $row['id'] . '">View Details</a>';
            echo '</div>';
        }
    } else {
        echo '<p>You have not uploaded any items yet.</p>';
    }

    // Add a link to create a new item
    echo '<a href="new_item.php">Create a New Item</a>';

    // TODO: Add any additional user-specific content

} else {
    // User is not logged in, display login/register links
    echo '<h2>Welcome to the Marketplace!</h2>';
    // Show login and register links
    echo '<a href="login_register_form.php">Login or register</a>';
}
    echo '<p>Explore our items:</p>';

    // Display all items regardless of user session
    $all_items_query = "SELECT * FROM products";
    $all_items_result = $conn->query($all_items_query);

    if ($all_items_result->num_rows > 0) {
        while ($row = $all_items_result->fetch_assoc()) {
            echo '<div>';
            echo '<h3>' . $row['name'] . '</h3>';
            echo '<p>Category: ' . $row['category'] . '</p>';
            echo '<p>Description: ' . $row['descr'] . '</p>';
            echo '<p>Price: $' . $row['price'] . '</p>';
            echo '<img src="' . $row['image_path'] . '" alt="' . $row['name'] . '" style="max-width: 200px; max-height: 200px;">'; // Display image
            echo '<a href="item_detail.php?id=' . $row['id'] . '">View Details</a>';
            echo '</div>';
        }
    } else {
        echo '<p>No items available.</p>';
    }

    

// TODO: Add any additional HTML content or links
?>

</body>
</html>
