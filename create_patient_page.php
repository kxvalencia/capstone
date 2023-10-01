*/ Insert your PHP code above /*

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
            <a href="Patient List page.html">Patients</a>
            <a href="prescriptions.html">Prescriptions</a>
            <a href="appointments.html">Appointments</a>
            <a href="reports.html">Reports & Analytics</a>
        </div>
    </div>
    
    <div class="container">
        <form action="/submit" method="POST" id="createPatientForm">
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
                <label for="height">Height (in):</label>
                <input type="number" id="height" name="height" required>
            </div>
            <div class="input-group">
                <label for="weight">Weight (lbs):</label>
                <input type="number" id="weight" name="weight" required>
            </div>
            <div class="input-group">
                <label for="bloodType">Blood Type:</label>
                <select id="bloodType" name="bloodType" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
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
