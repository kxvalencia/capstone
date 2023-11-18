<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id21196724_capstone";

try {
    // Create database connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if Signup button was pressed
    if (isset($_POST['signup'])) {
        $name = $_POST['signup_name'];
        $email = $_POST['signup_email'];
        $hashedPassword = password_hash($_POST['signup_password'], PASSWORD_DEFAULT);
        $phone = $_POST['signup_phone']; // Phone number from the signup form

        $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (:name, :email, :password, :phone)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':phone', $phone);

        $stmt->execute();
        echo "Signup successful. You can now login.";
    }

    // Check if Login button was pressed
    if (isset($_POST['login'])) {
        $email = $_POST['login_email'];
        $password = $_POST['login_password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, start a session
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            $_SESSION['name'] = $user['name']; // Store user name in session
            $_SESSION['email'] = $user['email']; // Store email in session

            // Redirect to dashboard.php
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Invalid login credentials.";
        }
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
