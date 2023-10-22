<?php
include 'db.php';

try {
    $query = '%' . $_POST['query'] . '%'; 
    $stmt = $pdo->prepare("SELECT patient_id, name FROM patients WHERE name LIKE :query");
    $stmt->bindParam(':query', $query);
    $stmt->execute();

    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    echo json_encode($patients);

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
