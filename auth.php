<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id21196724_capstone";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if Signup button was pressed
    if (isset($_POST['signup'])) {
        $name = $_POST['signup_name'];
        $email = $_POST['signup_email'];
        $hashedPassword = password_hash($_POST['signup_password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

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
            // Password is correct, start a session and redirect
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
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
