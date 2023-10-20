<?php
include 'db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $height_feet = $_POST['height_ft'];
    $height_inches = $_POST['height_in'];
    $weight_pounds = $_POST['weight'];
    $blood_type = $_POST['bloodType'];
    $medical_history = $_POST['medicalHistory'];

    $stmt = $pdo->prepare("INSERT INTO patients (name, sex, height_feet, height_inches, weight_pounds, blood_type, medical_history) VALUES (?, ?, ?, ?, ?, ?, ?)");

    if ($stmt->execute([$name, $sex, $height_feet, $height_inches, $weight_pounds, $blood_type, $medical_history])) {
        $message = 'Patient successfully added!';
    } else {
        $message = 'There was an error adding the patient. Please try again.';
    }
}


$stmt = $pdo->prepare("INSERT INTO patients (name, sex, height_feet, height_inches, weight_pounds, blood_type, medical_history) VALUES (?, ?, ?, ?, ?, ?, ?)");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create a Patient</title>
    <link rel="stylesheet" type="text/css" href="create_patient.css">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@800;900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <h1>Patient Management System</h1>
        <div class="nav">
            <a href="patient.php">Patients</a>
            <a href="prescriptions.php">Prescriptions</a>
            <a href="appointments.php">Appointments</a>
            <a href="reports.php">Reports & Analytics</a>
        </div>
    </div>

    <div class="container">
        <?php if (!empty($message)): ?>
            <div class="alert">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" id="createPatientForm">
            <div class="input-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="input-group">
                <label for="sex">Sex:</label>
                <select id="sex" name="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="input-group">
                <label for="height_ft">Height (ft):</label>
                <input type="number" id="height_ft" name="height_ft" required>
            </div>
            <div class="input-group">
                <label for="height_in">Height (in):</label>
                <input type="number" id="height_in" name="height_in" required>
            </div>
            <div class="input-group">
                <label for="weight">Weight (lbs):</label>
                <input type="number" id="weight" name="weight" required>
            </div>
            <div class="input-group">
                <label for="bloodType">Blood Type:</label>
                <select id="bloodType" name="bloodType" required>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="input-group">
                <label for="medicalHistory">Previous Medical History:</label>
                <textarea id="medicalHistory" name="medicalHistory" rows="4" required></textarea>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</body>

</html>