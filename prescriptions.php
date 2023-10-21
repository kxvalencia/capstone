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
            <a href="appointments.php">Appointments</a>
            <a href="reports_analytics_page.php">Reports & Analytics</a>
        </div>
    </div>

    <div class="container">

        <div class="top-section">
            <button class="create-button" onclick="window.location.href='create_prescription.php'">Create a Prescription</button>
            
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
            <div>Total Prescriptions: <span id="totalPrescriptions">0</span></div>
            <div>Active Prescriptions: <span id="activePrescriptions">0</span></div>
            <div>Expiring Soon: <span id="expiringPrescriptions">0</span></div>
        </div>

        <!-- List of Prescriptions -->
        <ul class="prescription-list">
            <!-- Sample Prescription Entry -->
            <li>
                <div class="patient-info">
                    <span class="patient-name">John Doe</span>
                    <span class="medication">Ibuprofen - 200mg daily</span>
                </div>
                <div class="prescription-info">
                    <span class="date-prescribed">Prescribed: 01/01/2023</span>
                    <span class="expiration-date">Expires: 01/01/2024</span>
                    <span class="doctor-name">Dr. Smith</span>
                    <span class="status-label active">Active</span>
                </div>
                <button onclick="viewPrescriptionDetails()">View Details</button>
            </li>
            <!-- Repeat similar blocks for each prescription -->
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
