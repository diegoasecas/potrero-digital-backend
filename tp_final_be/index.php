<?php
session_start();
require_once('db_connection.php');

// Process category filter
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$sort_order = isset($_GET['sort']) ? $_GET['sort'] : '';

// Build the SQL query based on category filter and sort order
$sql = "SELECT * FROM products";
if (!empty($category_filter)) {
    $sql .= " WHERE category = '$category_filter'";
}
if (!empty($sort_order)) {
    $sql .= " ORDER BY price $sort_order";
}

// Execute the query
$result = $conn->query($sql);
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
            // ... (your existing code for displaying user's items)
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

// Display category filter and sorting options
echo '<form action="index.php" method="get">';
echo '<label for="category">Select Category:</label>';
echo '<select name="category" id="category">';
echo '<option value="">All Categories</option>';

// Fetch categories from the database
$category_query = "SELECT DISTINCT category FROM products";
$category_result = $conn->query($category_query);

if ($category_result->num_rows > 0) {
    while ($category = $category_result->fetch_assoc()) {
        $selected = ($category_filter == $category['category']) ? 'selected' : '';
        echo '<option value="' . $category['category'] . '" ' . $selected . '>' . $category['category'] . '</option>';
    }
}

echo '</select>';
echo '<input type="submit" value="Filter by Category">';
echo '</form>';

echo '<p>Sort by Price: ';
echo '<a href="index.php?sort=asc">Ascending</a> | ';
echo '<a href="index.php?sort=desc">Descending</a> | ';
echo '</p>';

// Build the SQL query based on category filter and sort order
$sql = "SELECT * FROM products";
if (!empty($category_filter)) {
    $sql .= " WHERE category = '$category_filter'";
}
if (!empty($sort_order)) {
    $sql .= " ORDER BY price $sort_order";
}

// Execute the query
$result = $conn->query($sql);

// Display all items regardless of user session
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
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

// Close the database connection
$conn->close();
?>

</body>

</html>
