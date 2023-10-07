<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="patient_profile.css">
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

    <div class="profile-box">
        <div class="profile-section">
            <h2>Personal Details</h2>
            <p><strong>Name:</strong></p>
            <p><strong>Sex:</strong></p>
            <p><strong>Height:</strong></p> /* Make edit for feet and inches */
            <p><strong>Weight:</strong></p>
            <p><strong>Blood Type:</strong></p>
        </div>

        <div class="nav">
            <a href="#medical-history">Medical History</a>
            <a href="#medications">Medications</a>
            <a href="#allergies">Allergies</a>
        </div>

        <div class="profile-section" id="medical-history">
            <h3>Medical History</h3>
        </div>

        <div class="profile-section" id="medications">
            <h3>Medications</h3>
        </div>

        <div class="profile-section" id="allergies">
            <h3>Allergies</h3>
        </div>

        <div class="action-buttons">
            <button class="btn-edit">Edit</button>
            <button class="btn-delete">Delete</button>
        </div>

        <button class="create-button" onclick="window.location.href='patient.php'">Back</button>

        <div class="profile-section">
            <h2>Emergency Contacts</h2>
        </div>
    </div>

</body>
</html>
