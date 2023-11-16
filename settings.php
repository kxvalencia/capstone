<!DOCTYPE html>

<html>
    
    <link rel="stylesheet" href="settings.css">
    
    <script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    </script>
    
    <body>
    
    <div class="header" id="head">
        <!--<h1><a href="create_patient_page.php">Create Page</a> <a href="https://www.tacobell.com/">Notice</a> <span style="float:right;"><a href="index.html">Logout</a> Nurse Info</span></h1>-->
        <div class="profile">
        <a href="#"><img src="./img/ProfilePic.png" alt=""/></a>
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
    
    <div class="followingWrapper">
      <div class="card">
        <h3>User Info</h3>
        <p>Phone Number:</p>
        <p>Email:</p>
        <p>Social Security:</p>
        <p>Perscriptions:</p>
      </div>
      <div class="card">
        <h3>Change Password</h3>
        <label for="password">Old Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <label for="password">Retype New Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <button type="submit" class="submitButton" name="submit">Submit</button>
      </div>
      <div class="card">
        <h3>Change Contact Info</h3>
        <label for="phone">New Phone Number:</label>
        <input type="phone" id="phone" name="phone"><br><br>
        <button type="submit" class="submitButton" name="submit">Submit</button>
        <p></p>
        <label for="phone">New Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <button type="submit" class="submitButton" name="submit">Submit</button>
      </div>

    </div>
    </div>
      
</html>
