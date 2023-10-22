<?php

include 'db.php';

if (isset($_GET['patient_id'])) {
    $patientId = $_GET['patient_id'];
    try {
        $stmt = $pdo->prepare("SELECT * FROM patients WHERE patient_id = :patientId");
        $stmt->bindParam(':patientId', $patientId);
        $stmt->execute();
        $patient = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No patient ID provided.";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details for <?php echo htmlspecialchars($patient['name']); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <h1>Patient Details</h1>
    </div>

    <div class="patient-details">
        <h2><?php echo htmlspecialchars($patient['name']); ?></h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($patient['name']); ?></p>
        <p><strong>Sex:</strong> <?php echo $patient['sex']; ?></p>
        <p><strong>Height:</strong> <?php echo $patient['height_feet'] . "'" . $patient['height_inches'] . '"'; ?></p>
        <p><strong>Weight:</strong> <?php echo $patient['weight_pounds']; ?> lbs</p>
        <p><strong>Blood Type:</strong> <?php echo $patient['blood_type']; ?></p>
        <p><strong>Medical History:</strong> <?php echo nl2br(htmlspecialchars($patient['medical_history'])); ?></p>
    </div>

</body>

</html>
