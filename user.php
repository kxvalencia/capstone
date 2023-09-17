<?php
session_start();

// If not logged in, redirect to the auth.html page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: auth.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<html>
    <link rel="stylesheet" href="dashstyle.css">
    <div class="header">
        <h1><a href="https://www.tacobell.com/">Notice</a> <a href="https://www.tacobell.com">Tasks</a></h1>
    </div>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard</title>
</head>
<body>

<h1>Welcome <?php echo $_SESSION['name']; ?>!</h1>
<p>email: <?php echo $_SESSION['email']; ?></p>

<form action="logout.php" method="post">
    <input type="submit" value="Logout">
</form>

<!-- You can add more HTML content here, and if needed, embed more PHP wherever necessary. -->

</body>
</html>

