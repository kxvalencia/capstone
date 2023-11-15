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
    <title>Patient Details for
        <?php echo htmlspecialchars($patient['name']); ?>
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="patient_profile.css">
</head>

<body>
    <div class="header">
        <h1>Patient Details</h1>
        <div class="nav">
            <a href="patient.php">Patients</a>
            <a href="prescriptions.php">Prescriptions</a>
            <a href="Appointments.php">Appointments</a>
            <a href="reports.php">Reports & Analytics</a>
        </div>
    </div>

    <div class="profile-box">
        <div class="profile-section">
            <h2>
                <?php echo htmlspecialchars($patient['name']); ?>
            </h2>
            <p><strong>Name:</strong>
                <?php echo htmlspecialchars($patient['name']); ?>
            </p>
            <p><strong>Sex:</strong>
                <?php echo $patient['sex']; ?>
            </p>
            <p><strong>Height:</strong>
                <?php echo $patient['height_feet'] . "'" . $patient['height_inches'] . '"'; ?>
            </p>
            <p><strong>Weight:</strong>
                <?php echo $patient['weight_pounds']; ?> lbs
            </p>
            <p><strong>Blood Type:</strong>
                <?php echo $patient['blood_type']; ?>
            </p>
            <p><strong>Medical History:</strong>
                <?php echo nl2br(htmlspecialchars($patient['medical_history'])); ?>
            </p>
        </div>

        <div class="tabs">
            <a class="tab-link active" onclick="showTab('medical-history')">Medical History</a>
            <a class="tab-link" onclick="showTab('medications')">Medications</a>
            <a class="tab-link" onclick="showTab('allergies')">Allergies</a>
            <a class="tab-link" onclick="showTab('prescriptions')">Prescriptions</a>
            <a class="tab-link" onclick="showTab('appointments')">Appointments</a>
        </div>

        <div class="profile-section tab-content active" id="medical-history">
            <h3>Medical History</h3>
            <button class="btn-add-record" onclick="addNewRecord()">Add New Record</button>
            <div class="medical-records">
                <!-- List of medical records will be displayed here -->
            </div>
        </div>

        <div class="profile-section tab-content" id="medications">
            <h3>Medications</h3>
            <button class="btn-add-med" onclick="addNewMed()">Add New Medication</button>
            <div class="new-Medication">

            </div>
        </div>

        <div class="profile-section tab-content" id="allergies">
            <h3>Allergies</h3>
            <button class="btn-update-allergies" onclick="updateNewAllergy()">Update Allergies</button>
            <div class="updateAllergies">
                <!-- List of allergies will be displayed here -->
            </div>
        </div>

        <div class="profile-section tab-content" id="prescriptions">
            <h3>Allergies</h3>
            <button class="btn-add-prescriptions" onclick="addNewPrescription()">Add a New Prescription</button>
            <div class="new-Prescription">
                <!-- List of prescriptions will be displayed here -->
            </div>
        </div>

        <div class="profile-section tab-content" id="appointments">
            <h3>Allergies</h3>
            <button class="btn-add-appointments" onclick="addNewAppointment()">New Appointment</button>
            <div class="new-Appointment">
                <!-- List of appointments will be displayed here -->
            </div>
        </div>

        <div class="profile-section">
            <h2>Emergency Contacts</h2>
        </div>

    </div>

    <script>
        function showTab(tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => {
                tab.classList.remove('active');
            });

            const tabLinks = document.querySelectorAll('.tab-link');
            tabLinks.forEach(link => {
                link.classList.remove('active');
            });

            document.getElementById(tabId).classList.add('active');
            [...tabLinks].find(link => link.getAttribute('onclick') === `showTab('${tabId}')`).classList.add('active');
        }

        function addNewRecord() {

        }
    </script>

</body>

</html>