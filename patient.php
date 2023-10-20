<?php

include 'db.php';

$patients = []; // An empty array to store the patient names

try {
    // Using $pdo instead of $conn, if that's the name in your db.php
    $stmt = $pdo->prepare("SELECT name FROM patients"); // Query to select patient names
    $stmt->execute();

    // Fetch all patient names and store them in the $patients array
    $patients = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valencia Medical</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="patient.css">
</head>

<body>
    <div class="header">
        <h1>Valencia Medical</h1>
        <div class="nav">
            <a href="patient.php">Patients</a>
            <a href="prescriptions_page.php">Prescriptions</a>
            <a href="appointments_page.php">Appointments</a>
            <a href="reports_analytics_page.php">Reports & Analytics</a>
        </div>
    </div>

    <div class="container">
        <button class="create-button" onclick="window.location.href='create_patient_page.php'">Create a Patient</button>

        <div class="top-section">
            <div class="search-container">
                <input type="text" id="searchBox" placeholder="Search for a patient...">
                <button onclick="searchUsers()">Search</button>
            </div>
        </div>

        <ul class="patient-list">
            <?php foreach ($patients as $patient): ?>
                <li><a class="patient-name" href="#">
                        <?php echo htmlspecialchars($patient); ?>
                    </a></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script>
        function searchUsers() {
            const query = document.getElementById('searchBox').value;
            fetch('search.php', {
                method: 'POST',
                body: new URLSearchParams(`query=%${query}%`),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                }
            })
                .then(response => response.json())
                .then(users => {
                    const patientList = document.querySelector('.patient-list');
                    patientList.innerHTML = '';
                    users.forEach(user => {
                        const listItem = document.createElement('li');
                        const link = document.createElement('a');
                        link.classList.add('patient-name');
                        link.href = "#";
                        link.textContent = user.name;
                        listItem.appendChild(link);
                        patientList.appendChild(listItem);
                    });
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                });
        }
    </script>
</body>

</html>