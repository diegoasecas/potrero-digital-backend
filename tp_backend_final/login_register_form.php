<!-- login_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceeder</title>
    <!-- TODO: Add any additional head elements (stylesheets, scripts, etc.) -->
</head>
<body>
<p>login</p>
<form action="login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Acceder">
</form>

<p>register</p>
<form action="register.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <input type="submit" value="Register">
</form>


<!-- TODO: Add any additional HTML content or links -->

</body>
</html>
