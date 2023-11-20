<?php
include 'db.php';

if (isset($_GET['patient_id'])) {
    $patientId = $_GET['patient_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extract and sanitize input data
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $heightFeet = $_POST['height_feet'];
        $heightInches = $_POST['height_inches'];
        $weightPounds = $_POST['weight_pounds'];
        $bloodType = $_POST['blood_type'];
        $medicalHistory = $_POST['medical_history'];
        $allergies = $_POST['allergies'];
        $insurance = $_POST['insurance'];
        $emergencyContact = $_POST['emergency_contact_phone'];

        // SQL query to update patient details
        $sql = "UPDATE patients SET name=?, sex=?, height_feet=?, height_inches=?, weight_pounds=?, blood_type=?, medical_history=?, allergies=?, insurance=?, emergency_contact_phone=? WHERE patient_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $sex, $heightFeet, $heightInches, $weightPounds, $bloodType, $medicalHistory, $allergies, $insurance, $emergencyContact, $patientId]);

        header("Location: patient_profile.php?patient_id=" . $patientId); // Redirect back to the profile page
        exit();
    }

    // Fetch patient details
    $stmt = $pdo->prepare("SELECT * FROM patients WHERE patient_id = :patientId");
    $stmt->bindParam(':patientId', $patientId);
    $stmt->execute();
    $patient = $stmt->fetch(PDO::FETCH_ASSOC);
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
        <h1>Patient Profile</h1>
        <div class="nav">
            <a href="patient.php">Patients</a>
            <a href="prescriptions.php">Prescriptions</a>
            <a href="Appointments.php">Appointments</a>
            <a href="reports.php">Reports & Analytics</a>
        </div>
    </div>

    <div class="profile-box">
        <div class="profile-section">
            <form action="patient_profile.php?patient_id=<?php echo $patientId; ?>" method="post">
                <p>
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($patient['name']); ?>">
                </p>

                <p>
                    <label for="sex">Sex:</label>
                    <select name="sex">
                        <option value="Male" <?php echo $patient['sex'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo $patient['sex'] == 'Female' ? 'selected' : ''; ?>>Female
                        </option>
                        <option value="Other" <?php echo $patient['sex'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                        <option value="Prefer Not to Say" <?php echo $patient['sex'] == 'Prefer Not to Say' ? 'selected' : ''; ?>>Prefer Not to Say</option>
                    </select>
                </p>

                <p>
                    <label for="height_feet">Height (Feet):</label>
                    <input type="number" name="height_feet"
                        value="<?php echo htmlspecialchars($patient['height_feet']); ?>" min="0">
                </p>

                <p>
                    <label for="height_inches">Height (Inches):</label>
                    <input type="number" name="height_inches"
                        value="<?php echo htmlspecialchars($patient['height_inches']); ?>" min="0" max="11">
                </p>

                <p>
                    <label for="weight_pounds">Weight (Pounds):</label>
                    <input type="number" name="weight_pounds"
                        value="<?php echo htmlspecialchars($patient['weight_pounds']); ?>" step="0.1" min="0">
                </p>

                <p>
                    <label for="blood_type">Blood Type:</label>
                    <select name="blood_type">
                        <option value="A+" <?php echo $patient['blood_type'] == 'A+' ? 'selected' : ''; ?>>A+</option>
                        <option value="A-" <?php echo $patient['blood_type'] == 'A-' ? 'selected' : ''; ?>>A-</option>
                        <option value="B+" <?php echo $patient['blood_type'] == 'B+' ? 'selected' : ''; ?>>B+</option>
                        <option value="B-" <?php echo $patient['blood_type'] == 'B-' ? 'selected' : ''; ?>>B-</option>
                        <option value="AB+" <?php echo $patient['blood_type'] == 'AB+' ? 'selected' : ''; ?>>AB+</option>
                        <option value="AB-" <?php echo $patient['blood_type'] == 'AB-' ? 'selected' : ''; ?>>AB-</option>
                        <option value="O+" <?php echo $patient['blood_type'] == 'O+' ? 'selected' : ''; ?>>O+</option>
                        <option value="O-" <?php echo $patient['blood_type'] == 'O-' ? 'selected' : ''; ?>>O-</option>
                    </select>
                </p>

                <p>
                    <label for="medical_history">Medical History:</label>
                    <textarea
                        name="medical_history"><?php echo htmlspecialchars($patient['medical_history']); ?></textarea>
                </p>

                <p>
                    <label for="allergies">Allergies:</label>
                    <textarea name="allergies"><?php echo htmlspecialchars($patient['allergies']); ?></textarea>
                </p>

                <p>
                    <label for="insurance">Insurance:</label>
                    <input type="text" name="insurance" value="<?php echo htmlspecialchars($patient['insurance']); ?>">
                </p>

                <p>
                    <label for="emergency_contact_phone">Emergency Contact Phone:</label>
                    <input type="text" name="emergency_contact_phone"
                        value="<?php echo htmlspecialchars($patient['emergency_contact_phone']); ?>">
                </p>


                <div class="tabs">
                    <a class="tab-link active" onclick="showTab('patient-details')">Edit Patient Details</a>
                    <a class="tab-link" onclick="showTab('medications')">Medications</a>
                    <a class="tab-link" onclick="showTab('allergies')">Allergies</a>
                    <a class="tab-link" onclick="showTab('prescriptions')">Prescriptions</a>
                    <a class="tab-link" onclick="showTab('appointments')">Appointments</a>
                </div>

                <div class="profile-section tab-content active" id="patient-details">
                    <h3>Edit Patient Details</h3>
                    <input type="submit" class="btn-add-record" value="Submit Changes">

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

        </form>

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