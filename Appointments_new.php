<?php
require 'db.php'; // Ensure the database connection file is correctly linked

$patients = $pdo->query("SELECT patient_id, name FROM patients")->fetchAll(PDO::FETCH_ASSOC);
$selectedAppointment = null;

if (isset($_GET['select_id']) && $_GET['select_id'] != '') {
    $stmt = $pdo->prepare("SELECT * FROM appointments WHERE appointment_id = ?");
    $stmt->execute([$_GET['select_id']]);
    $selectedAppointment = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract and sanitize input data
    $patientId = $_POST['patient_id'];
    $appointmentDate = $_POST['appointment_date'];
    $appointmentTime = $_POST['appointment_time'];
    $physician = $_POST['physician'];
    $reasonForVisit = $_POST['reason_for_visit'];
    $notes = $_POST['notes'];

    if (!empty($_POST['appointment_id'])) {
        $appointmentId = $_POST['appointment_id'];
        $sql = "UPDATE appointments SET patient_id=?, appointment_date=?, appointment_time=?, physician=?, reason_for_visit=?, notes=? WHERE appointment_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$patientId, $appointmentDate, $appointmentTime, $physician, $reasonForVisit, $notes, $appointmentId]);
    } else {
        $sql = "INSERT INTO appointments (patient_id, appointment_date, appointment_time, physician, reason_for_visit, notes) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$patientId, $appointmentDate, $appointmentTime, $physician, $reasonForVisit, $notes]);
    }

    header("Location: Appointments_new.php");
    exit();
}

function getAllAppointments($pdo)
{
    $stmt = $pdo->query("SELECT appointments.appointment_id, patients.name as patient_name, appointments.appointment_date, appointments.appointment_time, appointments.physician, appointments.reason_for_visit, appointments.notes FROM appointments JOIN patients ON appointments.patient_id = patients.patient_id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Handle delete request
if (isset($_GET['delete_id']) && $_GET['delete_id'] != '') {
    $stmt = $pdo->prepare("DELETE FROM appointments WHERE appointment_id = ?");
    $stmt->execute([$_GET['delete_id']]);

    header("Location: Appointments_new.php");
    exit();
}

$appointments = getAllAppointments($pdo);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Appointments.css">
</head>

<body>
    <!-- Header pane -->
    <div class="header">
        <h1>Appointments</h1>
        <div class="nav">
            <a href="patient.php">Patients</a>
            <a href="prescriptions.php">Prescriptions</a>
            <a href="patient_profile.php">Patient Management System</a>
            <a href="reports.php">Reports & Analytics</a>
        </div>
    </div>

    <div class="profile-box">
        <div class="profile-section">
            <h2>Create Appointment</h2>
            <!-- Appointment Form Section -->
            <form action="Appointments_new.php" method="post">
                <input type="hidden" name="appointment_id"
                    value="<?php echo $selectedAppointment['appointment_id'] ?? ''; ?>">

                <!-- Patient ID Dropdown -->
                <label for="patient_id">Patient ID:</label>
                <select name="patient_id">
                    <?php foreach ($patients as $patient): ?>
                        <option value="<?php echo $patient['patient_id']; ?>" <?php echo $selectedAppointment && $selectedAppointment['patient_id'] == $patient['patient_id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($patient['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br />

                <label for="appointment_date">Date:</label>
                <input type="date" name="appointment_date"
                    value="<?php echo $selectedAppointment['appointment_date'] ?? ''; ?>">
                <br />

                <label for="appointment_time">Time:</label>
                <input type="time" name="appointment_time"
                    value="<?php echo $selectedAppointment['appointment_time'] ?? ''; ?>">
                <br />

                <label for="physician">Physician:</label>
                <input type="text" name="physician" value="<?php echo $selectedAppointment['physician'] ?? ''; ?>">
                <br />

                <label for="reason_for_visit">Reason for Visit:</label>
                <select name="reason_for_visit">
                    <?php
                    $reasonsForVisit = ['First Visit', 'Follow-up Visit', 'Wellness Check', 'Pre-Op Consultation', 'Surgery', 'Post-op Consultation'];
                    foreach ($reasonsForVisit as $reason): ?>
                        <option value="<?php echo $reason; ?>" <?php echo (isset($selectedAppointment) && $selectedAppointment['reason_for_visit'] == $reason) ? 'selected' : ''; ?>>
                            <?php echo $reason; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br />

                <label for="notes">Notes:</label>
                <textarea name="notes"><?php echo $selectedAppointment['notes'] ?? ''; ?></textarea>
                <br />

                <input type="submit"
                    value="<?php echo isset($selectedAppointment) ? 'Update Appointment' : 'Create Appointment'; ?>">
            </form>
            <div>
                <a href="Appointments_new.php">Create New Appointment</a>
            </div>
        </div>

        <!-- Appointments List -->
        <div>
        <h1>Appointments</h1>
        <table>
            <!-- Table Headers -->
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Physician</th>
                <th>Reason for Visit</th>
                <th>Notes</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>

            <!-- Table Rows -->
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?php echo htmlspecialchars($appointment['appointment_id']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['patient_name']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['physician']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['reason_for_visit']); ?></td>
                    <td><?php echo htmlspecialchars($appointment['notes']); ?></td>
                    <td><a href="Appointments_new.php?select_id=<?php echo $appointment['appointment_id']; ?>"><button>Edit</button></a></td>
                    <td><a href="Appointments_new.php?delete_id=<?php echo $appointment['appointment_id']; ?>" onclick="return confirm('Are you sure you want to delete this appointment?');"><button>Remove</button></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>