<?php
include 'db.php';

// Fetch patients for dropdown
$patients = $pdo->query("SELECT patient_id, name FROM patients")->fetchAll(PDO::FETCH_ASSOC);

$success = false;
$error = '';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Extract and sanitize the form data
        $patientId = $_POST['patient_id'];
        $drugName = $_POST['drug_name'];
        $dosageMg = $_POST['size_mg'];
        $drugClass = $_POST['drug_class'];
        $prescribedDate = $_POST['prescribed_date'];
        $prescribingDoctor = $_POST['doctor_name'];
        $isActive = isset($_POST['is_active']) ? 1 : 0;

        // SQL to insert data
        $sql = "INSERT INTO prescriptions (patient_id, drug_name, size_mg, drug_class, prescribed_date, doctor_name, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$patientId, $drugName, $dosageMg, $drugClass, $prescribedDate, $prescribingDoctor, $isActive]);

        $success = true;

        // Redirect to avoid re-submission
        header("Location: prescriptions.php");
        exit;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    }
}

// Fetch prescriptions with patient names and dosage
$prescriptions = $pdo->query("SELECT p.prescription_id, pa.name AS patient_name, p.drug_name, p.size_mg, p.prescribed_date, p.doctor_name, p.is_active FROM prescriptions p INNER JOIN patients pa ON p.patient_id = pa.patient_id")->fetchAll(PDO::FETCH_ASSOC);


// Handling prescription deletion
if (isset($_GET['delete_id'])) {
    $deleteStmt = $pdo->prepare("DELETE FROM prescriptions WHERE prescription_id = ?");
    $deleteStmt->execute([$_GET['delete_id']]);
    header("Location: prescriptions.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valencia Medical - Prescriptions</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="prescriptions.css">
</head>

<body>
    <div class="header">
        <h1>Valencia Medical</h1>
        <div class="nav">
            <a href="patient.php">Patients</a>
            <a href="prescriptions.php">Prescriptions</a>
            <a href="Appointments.php">Appointments</a>
            <a href="reports.php">Reports & Analytics</a>
        </div>
    </div>

    <div class="container">

        <div class="top-section">
            <!-- Prescription Creation Form -->
            <div class="create-prescription-form">
                <form action="prescriptions.php" method="post">
                    <label for="patient_id">Patient:</label>
                    <select name="patient_id">
                        <?php foreach ($patients as $patient) : ?>
                            <option value="<?php echo $patient['patient_id']; ?>">
                                <?php echo htmlspecialchars($patient['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select><br>

                    <label for="drug_name">Drug Name:</label>
                    <input type="text" name="drug_name"><br>

                    <label for="size_mg">Dosage (mg):</label>
                    <input type="number" name="size_mg"><br>

                    <label for="drug_class">Drug Class:</label>
                    <input type="text" name="drug_class"><br>

                    <label for="prescribed_date">Prescribed Date:</label>
                    <input type="date" name="prescribed_date"><br>

                    <label for="doctor_name">Prescribing Doctor:</label>
                    <input type="text" name="doctor_name"><br>

                    <label for="is_active">Active Prescription:</label>
                    <input type="checkbox" name="is_active" value="1"><br>

                    <input type="submit" value="Create Prescription">
                </form>
            </div>

            <div class="search-container">
                <input type="text" id="searchBox" placeholder="Search by patient's name or prescription ID...">
                <button onclick="searchPrescriptions()">Search</button>
            </div>

            <!-- Filter Options -->
            <div class="filters">
                <select id="dateFilter">
                    <option value="all">All Dates</option>
                    <!-- Add date options here -->
                </select>

                <select id="statusFilter">
                    <option value="all">All Statuses</option>
                    <option value="active">Active</option>
                    <option value="expired">Expired</option>
                    <option value="renewal">Needs Renewal</option>
                </select>
            </div>
        </div>

        <!-- Dashboard Overview -->
        <div class="dashboard">
            <div>Total Prescriptions: <span id="totalPrescriptions">4</span></div>
            <div>Active Prescriptions: <span id="activePrescriptions">4</span></div>
            <div>Expiring Soon: <span id="expiringPrescriptions">0</span></div>
        </div>

        <!-- List of Prescriptions -->
<ul class="prescription-list">
    <?php foreach ($prescriptions as $prescription) : ?>
        <li>
            <div class="patient-info">
            <span class="patient-name"><?php echo htmlspecialchars($prescription['patient_name']); ?></span>
                <span class="medication"><?php echo htmlspecialchars($prescription['drug_name']); ?> - <?php echo htmlspecialchars($prescription['size_mg']); ?>mg</span>
            </div>
            <div class="prescription-info">
                <span class="date-prescribed">Prescribed: <?php echo htmlspecialchars($prescription['prescribed_date']); ?></span>
                <span class="expiration-date">Expires: <?php echo htmlspecialchars($prescription['expires_date'] ?? 'N/A'); ?></span>
                <span class="doctor-name"><?php echo htmlspecialchars($prescription['prescribing_doctor']); ?></span>
                <span class="status-label <?php echo $prescription['is_active'] ? 'active' : 'inactive'; ?>"><?php echo $prescription['is_active'] ? 'Active' : 'Inactive'; ?></span>
            </div>
            <button class="delete-button" onclick="window.location.href='prescriptions.php?delete_id=<?php echo $prescription['prescription_id']; ?>'">Delete</button>
        </li>
    <?php endforeach; ?>
</ul>

    </div>

    <script>
        function searchPrescriptions() {
            // Implement search functionality here
        }

        function viewPrescriptionDetails() {
            // Show detailed prescription info
        }
    </script>

</body>

</html>