<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id21196724_capstone";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $_POST['query'];
    $stmt = $conn->prepare("SELECT name FROM users WHERE name LIKE :query");
    $stmt->bindParam(':query', $query);
    $stmt->execute();

    $users = $stmt->fetchAll();
    echo json_encode($users);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>