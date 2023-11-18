<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or show a login error
    header("Location: login.php");
    exit;
}

// Fetch user data from the database
$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT name, email, phone FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Assigning user details to session variables for easy access
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_email'] = $user['email'];
$_SESSION['user_phone'] = $user['phone'];


$patientCount = 0;

try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM patients");
    $stmt->execute();

    // Fetch the row count
    $patientCount = $stmt->fetchColumn();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}


$appointmentCount = 0;

try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM appointments");
    $stmt->execute();

    // Fetch the row count
    $appointmentCount = $stmt->fetchColumn();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>


<!DOCTYPE html>

<html>

<link rel="stylesheet" href="dashboardDraft2.css">

<body>

    <!-- Header Pane -->
    <div class="header" id="head">
        <div class="profile">
            <a href="#"><img src="./img/ProfilePic.png" alt="" /></a>
            <h1>Valencia Medical</h1>
        </div>
        <div class="nav">
            <a href="patient.php">Patients</a>
            <a href="prescriptions.php">Prescriptions</a>
            <a href="appointments.php">Appointments</a>
            <a href="reports.php">Reports & Analytics</a>

        </div>
    </div>




    <script>
        window.onscroll = function () { scrollf() };

        var header = document.getElementById("head");

        var sticky = header.offsetTop;

        function scrollf() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }

    </script>

</body>

</html>

<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valencia Medical - Dashboard</title>


    <script>

        // Function to close all tabs
        function closeAllTabs() {
            document.getElementById("physician-Tab").style.display = "none";
            document.getElementById("hospital-Tab").style.display = "none";
            document.getElementById("schedule-Tab").style.display = "none";
            document.getElementById("settings-Tab").style.display = "none";
        }

        // Functions to open each tab
        function openFormPhysicians() {
            closeAllTabs();
            document.getElementById("physician-Tab").style.display = "block";
        }

        function openFormHospital() {
            closeAllTabs();
            document.getElementById("hospital-Tab").style.display = "block";
        }

        function openFormSchedule() {
            closeAllTabs();
            document.getElementById("schedule-Tab").style.display = "block";
        }

        function openFormSettings() {
            closeAllTabs();
            document.getElementById("settings-Tab").style.display = "block";
        }

        // Functions to close each tab individually
        function closeFormPhysician() {
            document.getElementById("physician-Tab").style.display = "none";
        }

        function closeFormHospital() {
            document.getElementById("hospital-Tab").style.display = "none";
        }

        function closeFormSchedule() {
            document.getElementById("schedule-Tab").style.display = "none";
        }

        function closeFormSetting() {
            document.getElementById("settings-Tab").style.display = "none";
        }

    </script>
</head>

<body>
    <div class="wrapper">
        <nav class="nav1">
            </p>
            <h1>Welcome
                <?php echo $_SESSION['name']; ?>!
            </h1>
            <p>Email:
                <?php echo $_SESSION['email']; ?>
            <div class="navBar">
                <div class="logo">
                    <img src="./img/logo.png" alt="" />
                    <span>Valencia Medical</span>

                </div>

                <!-- Search Box -->
                <div class="searcBox">
                    <input type="text" class="searchBar" placeholder="Search">
                    <button type="submit" class="searchButton">Search</button>
                </div>

                <!-- Nav bar tabs-->
                <a onclick="openFormPhysicians()">Physicians on Duty</a>
                <a href="#" onclick="openFormHospital()">Hospital Announcements</a>
                <a href="#" onclick="openFormSchedule()">Weekly Schedule</a>
                <a onclick="openFormSettings()">Settings</a>

                <!-- Logout button -->
                <form action="logout.php" method="post">
                    <input type="submit" value="Logout">
                </form>

            </div>

        </nav>

        <div class="mainBody">

            <!-- Cards area -->
            <div class="followingWrapper">
                <div class="card">
                    <img src="./img/AppointmentsPic.png" alt="" />
                    <h3>
                        <?php echo $patientCount; ?> Patients
                    </h3>
                </div>
                <div class="card">
                    <img src="./img/PatientPic.png" alt="" />
                    <h3>
                        <?php echo $appointmentCount; ?> Appointments
                    </h3>
                </div>
                <div class="card">
                    <img src="./img/HospitalPic.png" alt="" />
                    <h3>4 Perscription Notifications</h3>
                </div>
                <div class="card">
                    <img src="./img/HospitalPic.png" alt="" />
                    <h3>2 New Reports</h3>
                </div>

            </div>

            <!-- Display pane -->
            <div id="physician-Tab" class="mainBox">
                <form>

                    <h2>Physicians</h2>
                    <button onclick="closeFormPhysician()" class="closeButton">CLOSE</button>
                    <table>
                        <caption>
                            <h1>Physicians on Duty</h1>
                        </caption>
                        <tr>
                            <td style="background-color: darkgray;">Triage</td>
                            <td style="background-color: lightgray;">Dr Seuss</td>
                            <td style="background-color: lightgray;">Dr Meredith Gray</td>
                            <td style="background-color: lightgray;">Dr House</td>
                        </tr>
                        <tr>
                            <td style="background-color: darkgray;">Anestesia</td>
                            <td style="background-color: lightgray;">Dr Don Heller</td>
                            <td style="background-color: lightgray;">Dr Aaron Hudson</td>
                            <td style="background-color: lightgray;">Dr Ben Warren</td>
                        </tr>
                        <tr>
                            <td style="background-color: darkgray;">Cardiatrics</td>
                            <td style="background-color: lightgray;">Dr Preston Burk</td>
                            <td style="background-color: lightgray;">Dr Erica Hahn</td>
                            <td style="background-color: lightgray;">Dr Maggie Pierce</td>
                        </tr>
                        <tr>
                            <td style="background-color: darkgray;">OBGYN</td>
                            <td style="background-color: lightgray;">Dr Kate Lachman</td>
                            <td style="background-color: lightgray;">Dr Norman Russo</td>
                            <td style="background-color: lightgray;">Dr Carina DeLuca</td>
                        </tr>
                        <tr>
                            <td style="background-color: darkgray;">Orthopedics</td>
                            <td style="background-color: lightgray;">Dr Atticus Lincoln</td>
                            <td style="background-color: lightgray;">Dr Callie Torres</td>
                            <td style="background-color: lightgray;">Dr Nico Kim</td>
                        </tr>
                    </table>
                </form>
            </div>

            <div id="hospital-Tab" class="mainBox">
                <form>
                    <h2>Hospital Announcements</h2>
                    <button onclick="closeFormHospital()" class="closeButton">CLOSE</button>
                    <div class="announcementsDiv">
                        <p><strong> BLOOD DRIVE:</strong> 11/10 - 11/12 8am - 4pm</p>
                        <p><strong> TOY DRIVE:</strong> Donation Box - Main Lobby</p>
                        <p><strong> FUNDRAISER DINNER: </strong>Dinner at the Hilton @ 7pm</p>
                        <p><strong>SURGEON OF THE MONTH: </strong> Dr. Gonzalez</p>
                        <p><strong>NURSE OF THE MONTH: </strong> RN Sanchez</p>
                    </div>
                </form>
            </div>

            <div id="schedule-Tab" class="mainBox">
                <form>
                    <h2>Schedule</h2>
                    <button onclick="closeFormSchedule()" class="closeButton">CLOSE</button>
                    <table>
                        <caption>
                            <h1>Month of November</h1>
                        </caption>
                        <th>Group</th>
                        <th>Sunday</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <tr>
                            <td style="background-color: darkcyan;">Group A</td>
                            <td style="background-color: #6495ed">12pm - 12am</td>
                            <td style="background-color: #6495ed;">12pm - 12am</td>
                            <td style="background-color: #6495ed;">12pm - 12am</td>
                            <td style="background-color: #6495ed;">12pm - 12am</td>
                            <td>OFF</td>
                            <td>OFF</td>
                            <td>OFF</td>
                        </tr>
                        <tr>
                            <td style="background-color: darkcyan;">Group B</td>
                            <td>OFF</td>
                            <td>OFF</td>
                            <td>OFF</td>
                            <td style="background-color: orchid;">12pm - 12am</td>
                            <td style="background-color: orchid;">12pm - 12am</td>
                            <td style="background-color: orchid;">12pm - 12am</td>
                            <td style="background-color: orchid;">12pm - 12am</td>
                        </tr>
                        <tr>
                            <td style="background-color: darkcyan;">Group C</td>
                            <td>OFF</td>
                            <td style="background-color: yellowgreen;">6am - 6pm</td>
                            <td style="background-color: yellowgreen;">6am - 6pm</td>
                            <td style="background-color: yellowgreen;">6am - 6pm</td>
                            <td style="background-color: yellowgreen;">6am - 6pm</td>
                            <td>OFF</td>
                            <td>OFF</td>
                        </tr>
                        <tr>
                            <td style="background-color: darkcyan;">Group D</td>
                            <td style="background-color: burlywood;">6am - 6pm</td>
                            <td>OFF</td>
                            <td>OFF</td>
                            <td>OFF</td>
                            <td style="background-color: burlywood;">6am - 6pm</td>
                            <td style="background-color: burlywood;">6am - 6pm</td>
                            <td style="background-color: burlywood;">6am - 6pm</td>
                        </tr>
                        <tr>
                            <td style="background-color: darkcyan;">Group E</td>
                            <td>OFF</td>
                            <td>OFF</td>
                            <td style="background-color: coral;">12am - 12pm</td>
                            <td style="background-color: coral;"> 12am - 12pm</td>
                            <td style="background-color: coral;">12am - 12pm</td>
                            <td style="background-color: coral;">12am - 12pm</td>
                            <td>OFF</td>
                        </tr>
                        <tr>
                            <td style="background-color: darkcyan;">Group F</td>
                            <td style="background-color: fuchsia;">6pm - 6am</td>
                            <td style="background-color: fuchsia;">6pm - 6am</td>
                            <td>OFF</td>
                            <td>OFF</td>
                            <td>OFF</td>
                            <td style="background-color: fuchsia;">6pm - 6am</td>
                            <td style="background-color: fuchsia;">6pm - 6am</td>
                        </tr>
                    </table>
                </form>
            </div>


            <!-- Settings Tab -->
            <div id="settings-Tab" class="settingsTab">
                <button onclick="closeFormSetting()" class="closeButton">Close</button>
                <div class="settingsForm">
                    <h3>Account Settings</h3>
                    <form action="update_user_settings.php" method="post">
                        <!-- Change Name -->
                        <div class="form-group">
                            <label for="new_name">Change Name:</label>
                            <input type="text" name="new_name" placeholder="Enter new name"
                                value="<?php echo $_SESSION['user_name']; ?>">
                        </div>

                        <!-- Change Email -->
                        <div class="form-group">
                            <label for="new_email">Change Email:</label>
                            <input type="email" name="new_email" placeholder="Enter new email"
                                value="<?php echo $_SESSION['user_email']; ?>">
                        </div>

                        <!-- Change Phone Number -->
                        <div class="form-group">
                            <label for="new_phone">Change Phone Number:</label>
                            <input type="tel" name="new_phone" placeholder="Enter new phone number"
                                value="<?php echo $_SESSION['user_phone']; ?>">
                        </div>

                        <!-- Change Password -->
                        <div class="form-group">
                            <h3>Change Password</h3>
                            <input type="password" name="old_password" placeholder="Old Password" required>
                            <input type="password" name="new_password" placeholder="New Password">
                            <input type="password" name="confirm_new_password" placeholder="Re-enter Password">
                        </div>

                        <button class="submit-button" type="submit">Submit Changes</button>
                    </form>
                </div>
            </div>


            </form>
        </div>

    </div>
    </div>
</body>

</html>