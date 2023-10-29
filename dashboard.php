<!DOCTYPE html>

<html>
    
    <link rel="stylesheet" href="dashboard.css">
    
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

      


    <script>
        window.onscroll = function() {scrollf()};
                
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
</head>
<body>
<!-- Moved into 'Nav1 div'
</p><h1>Welcome <?php echo $_SESSION['name']; ?>!</h1>
<p>email: <?php echo $_SESSION['email']; ?>

<form action="logout.php" method="post">
    <input type="submit" value="Logout">
</form>
      -->  
<div class="wrapper">
  <nav class="nav1">
      </p><h1>Welcome <?php echo $_SESSION['name']; ?>!</h1>
      <p>Email: <?php echo $_SESSION['email']; ?>
    <div class="navBar">
      <div class="logo">
        <img src="./img/logo.png" alt="" />
        <span>Valencia Medical</span>
        
      </div>

      <a href="#">Dashboard</a>
      <a href="#">Example 1</a>
      <a href="#">Example 2</a>
      <a href="#">Example 3</a>
      <a href="#">Example 4</a>

      <form action="logout.php" method="post">
      <input type="submit" value="Logout">
      </form>

      <!--<a href="#" class="logout">logout</a> -->
    </div> 
  </nav>

  <div class="mainBody">
    <div class="header1">
      
    </div>
    <div class="followingWrapper">
      <div class="card">
        <img src="./img/AppointmentsPic.png" alt=""/>
        <h3>7 Patients</h3>
      </div>
      <div class="card">
        <img src="./img/PatientPic.png" alt=""/>
        <h3>5 Upcoming Appointments</h3>
      </div>
      <div class="card">
        <img src="./img/HospitalPic.png" alt=""/>
        <h3>Insert Widget</h3>
      </div>
      <div class="card">
        <img src="./img/HospitalPic.png" alt=""/>
        <h3>Insert Widget</h3>
      </div>

    </div>
  </div>
