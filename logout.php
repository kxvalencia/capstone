<?php
session_start();

// Unset all of the session variables related to the user
unset($_SESSION['loggedin']);
unset($_SESSION['name']);
unset($_SESSION['email']);

// Destroy the session
session_destroy();

// Redirect to the home page
header('Location: index.html');
exit;
?>
