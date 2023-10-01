<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id21196724_capstone";
$users = []; // An empty array to store the user names

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT name FROM users"); // Query to select names
    $stmt->execute();

    // Fetch all user names and store them in the $users array
    $users = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lato', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E3F2FD;
            /* Light blue */
            color: #333;
        }

        .header {
            background-color: #0D47A1;
            /* Dark blue */
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-weight: 500;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav {
            display: flex;
            justify-content: center;
            margin: 10px 0 30px 0;
        }

        .nav a {
            margin: 0 10px;
            color: #fff;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .nav a:hover {
            opacity: 0.8;
        }

        .container {
            padding: 20px 20px 0 20px;
            position: relative;
        }

        .create-button {
            position: absolute;
            right: 20px;
            top: 10px;
            /* Adjust accordingly */
            background-color: #0D47A1;
            /* Dark blue */
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .create-button:hover {
            background-color: #1A74C1;
            /* Medium dark blue */
        }

        #searchBox {
            padding: 10px;
            width: calc(100% - 20px);
            border-radius: 3px;
            border: 1px solid #0D47A1;
            /* Dark blue */
            flex-grow: 1;
            margin-bottom: 20px;
        }

        .patient-list {
            list-style-type: none;
            padding: 0 20px;
        }

        .patient-name {
            display: block;
            padding: 12px 15px;
            background-color: #BBDEFB;
            /* Medium blue */
            border: 1px solid #90CAF9;
            /* Lighter blue */
            margin-bottom: 10px;
            text-decoration: none;
            color: #333;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .patient-name:hover {
            background-color: #E3F2FD;
            /* Light blue */
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            overflow: auto;
        }

        .modal-content {
            background-color: #F5F5F5;
            /* Light grey */
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #B0BEC5;
            /* Medium grey */
            width: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: 10px;
            border-radius: 3px;
            border: 1px solid #B0BEC5;
            /* Medium grey */
        }

        textarea {
            resize: vertical;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Valencia Medical</h1>
        <div class="nav">
            <a href="#">Patients</a>
            <a href="#">Prescriptions</a>
            <a href="#">Appointments</a>
            <a href="#">Reports & Analytics</a>
        </div>
    </div>

    <div class="container">
        <button class="create-button" onclick="openModal('create')">Create a Patient</button>
        <div class="top-section">
            <input type="text" id="searchBox" placeholder="Search for a patient...">
            <button onclick="searchUsers()">Search</button>
        </div>

        <ul class="patient-list">
            <?php foreach ($users as $user): ?>
                <li><a class="patient-name" href="#">
                        <?php echo htmlspecialchars($user); ?>
                    </a></li>
            <?php endforeach; ?>
        </ul>
    </div>


    <script>
        function searchUsers() {
            const query = document.getElementById('searchBox').value;

            fetch('search.php', {
                method: 'POST',
                body: new URLSearchParams(`query=%${query}%`), // Use % for wildcard search
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                }
            })
                .then(response => response.json())
                .then(users => {
                    const patientList = document.querySelector('.patient-list');
                    patientList.innerHTML = ''; // Clear existing list

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