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
            <p><strong>Height:</strong> <input type="number" placeholder="Feet"> <input type="number" placeholder="Inches"></p>
            <p><strong>Weight:</strong></p>
            <p><strong>Blood Type:</strong></p>
            <p><strong>Insurance Provider:</strong></p>
        </div>

        <div class="tabs">
            <a class="tab-link active" onclick="showTab('medical-history')">Medical History</a>
            <a class="tab-link" onclick="showTab('medications')">Medications</a>
            <a class="tab-link" onclick="showTab('allergies')">Allergies</a>
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
            <div class="updateALlergies">

            </div>
        </div>

        <div class="profile-section">
            <h2>Emergency Contacts</h2>
        </div>

        <div class="profile-actions">
            <button class="btn-edit">Edit</button>
            <button class="btn-delete">Delete</button>
            <button class="create-button" onclick="window.location.href='patient.php'">Back</button>
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
