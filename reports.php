<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valencia Medical - Reports & Analytics</title>
  <link rel="stylesheet" href="styles7.css">
</head>
<body>

<div class="header" id="head">
  <div class="profile">
    <a href="#"><img src="./img/ProfilePic.png" alt="Profile Picture"/></a>
    <h1>Valencia Medical</h1>
  </div>
  <div class="nav">
    <a href="patient.php">Patients</a>
    <a href="prescriptions.php">Prescriptions</a>
    <a href="appointments.php">Appointments</a>
    <a href="reports.php">Reports & Analytics</a>
  </div>
</div>

<div class="mainBody">
  <!-- Reports & Analytics Dashboard Overview -->
  <div class="dashboard-overview">
    <h2>Dashboard Overview</h2>
    <div class="kpi-container">
      <div class="kpi">Patient Wait Times: <span id="patient-wait-times">15 mins</span></div>
      <div class="kpi">Bed Occupancy Rate: <span id="bed-occupancy-rate">75%</span></div>
      <div class="kpi">Average Treatment Costs: <span id="average-treatment-costs">$1,200</span></div>
    </div>
  </div>

  <!-- Patient Reports Section -->
  <div class="patient-reports-section">
    <h2>Patient Reports</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Last Visit</th>
          <th>Diagnosis</th>
        </tr>
      </thead>
      <tbody>
        <!-- Static patient report entry -->
        <tr>
          <td>001</td>
          <td>Jane Doe</td>
          <td>2023-03-22</td>
          <td>Chronic Sinusitis</td>
        </tr>

      </tbody>
    </table>
  </div>

 <!-- Financial Analytics Section -->
<div class="financial-analytics-section">
  <h2>Financial Analytics</h2>
  <div class="financial-content">
    <div class="financial-text">
      <p>Total Revenue: $500,000</p>
      <p>Monthly Expenses: $120,000</p>
      <p>Net Profit: $380,000</p>
    </div>
    <div class="financial-chart">
      <img src="D:/IT Capstone Project/Web Pages/Analytic.jpg" alt="Financial Analytics Chart" />
    </div>
  </div>
</div>



  <!-- Additional Analytics Section -->
  <div class="additional-analytics-section">
    <h2>Additional Analytics</h2>
    <p>New Patients This Month: 30</p>
    <p>Successful Treatments: 75</p>
    <p>Follow-up Appointments: 50</p>
    <!-- More analytics details can be added here -->
  </div>

</div>

<script>

</script>

</body>
</html>
