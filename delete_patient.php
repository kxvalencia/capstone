<?php
include 'db.php';

if (isset($_GET['patient_id'])) {
    $patientId = $_GET['patient_id'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM patients WHERE patient_id = ?");
        $stmt->execute([$patientId]);
    } catch (PDOException $e) {
        // Handle error
        echo "Error: " . $e->getMessage();
    }
}

header("Location: patient.php");
exit;
?>
