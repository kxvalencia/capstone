<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Not logged in.'); window.location.href='login.php';</script>";
    exit;
}

$userId = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldPasswordProvided = !empty($_POST['old_password']);
    $updatingPassword = !empty($_POST['new_password']) || !empty($_POST['confirm_new_password']);

    // First, verify the old password
    if ($oldPasswordProvided) {
        $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['old_password'], $user['password'])) {
            // Old password is correct, proceed with updates

            if (!empty($_POST['new_name'])) {
                $name = $_POST['new_name'];
                $stmt = $pdo->prepare("UPDATE users SET name = ? WHERE id = ?");
                $stmt->execute([$name, $userId]);
                $_SESSION['user_name'] = $name;
            }

            if (!empty($_POST['new_email'])) {
                $email = $_POST['new_email'];
                $stmt = $pdo->prepare("UPDATE users SET email = ? WHERE id = ?");
                $stmt->execute([$email, $userId]);
                $_SESSION['user_email'] = $email;
            }

            if (!empty($_POST['new_phone'])) {
                $phone = $_POST['new_phone'];
                $stmt = $pdo->prepare("UPDATE users SET phone = ? WHERE id = ?");
                $stmt->execute([$phone, $userId]);
                $_SESSION['user_phone'] = $phone;
            }

            if ($updatingPassword && !empty($_POST['new_password']) && !empty($_POST['confirm_new_password'])) {
                if ($_POST['new_password'] == $_POST['confirm_new_password']) {
                    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
                    $stmt->execute([$new_password, $userId]);
                    echo "<script>alert('Password updated successfully.');</script>";
                } else {
                    echo "<script>alert('New passwords do not match.');</script>";
                }
            }

            echo "<script>alert('Settings updated successfully.'); window.location.href='dashboard.php';</script>";
        } else {
            echo "<script>alert('Incorrect old password.');</script>";
        }
    } else if ($updatingPassword) {
        echo "<script>alert('Please enter your old password to change password settings.');</script>";
    } else {
        echo "<script>alert('Please enter your old password to update settings.');</script>";
    }
}
?>

