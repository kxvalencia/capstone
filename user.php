<?php
session_start();

// If not logged in, redirect to the auth.html page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: auth.html");
    exit;
}
?>

<!-- MAIN HTML CONTENT GOES HERE
============================================================= -->
<!DOCTYPE html>
<html>
<head>
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

