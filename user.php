<?php
session_start();

// If not logged in, redirect to the auth.html page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: auth.html");
    exit;
}
?>

<!DOCTYPE html>

<html>
    
    <link rel="stylesheet" href="tess.css">
    
    <body>
    
    <div class="header" id="head">
        <h1><a href="https://www.tacobell.com/">Notice</a> <a href="https://www.tacobell.com">Tasks</a></h1>
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
<title>User Dashboard</title>
</head>
<body>

<h1>Welcome <?php echo $_SESSION['name']; ?>!</h1>
<p>email: <?php echo $_SESSION['email']; ?></p>

<form action="logout.php" method="post">
    <input type="submit" value="Logout">
</form>

<!-- You can add more HTML content here, and if needed, embed more PHP wherever necessary. -->

</body>
</html>

