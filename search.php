<?php
include 'db.php';

try {
    $query = '%' . $_POST['query'] . '%'; // Add wildcards for LIKE query
    $stmt = $pdo->prepare("SELECT name FROM patients WHERE name LIKE :query");
    $stmt->bindParam(':query', $query);
    $stmt->execute();

    $patients = $stmt->fetchAll();
    echo json_encode($patients);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
