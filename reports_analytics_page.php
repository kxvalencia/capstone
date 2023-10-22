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
            
            <div class="filters">
                
                <select id="statusFilter">
                    <option value="date">Date</option>
                    <option value="patient">Patient Group</option>
                </select>
            </div>
        </div>

        
        <div class="dashboard">
            <!--<img src= alt=>-->
        </div>

        
        <ul class="prescription-list">
                <button onclick="download">Download</button>
        </ul>

    </div>


</body>

</html>
