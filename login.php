<!DOCTYPE html>
<html>

<link rel="stylesheet" href="login.css">
<!--<div class="header" id="head">-->
    
</div>
<head>
    <title>Signup/Login</title>
</head>

<body>
    <div class="header">
        <h1>
            Welcome to Valencia Medical
        </h1>
    </div>

    <div class="valencia">
        <div class="formBox">
            <div class="buttonBox">
            <div id="btn"></div>
                <button type="button" class="toggleButton" onclick="signupID()">Sign-up</button>
                <button type="button" class="toggleButton" onclick="loginID()">Login</button>

            </div>
            <form id="signupID" class="inputGroup" action="auth.php" method="post">
                <input type="text" placeholder="Name" class="inputField" name="signup-name"><br>
                <input type="text" placeholder="Email" class="inputField" name="signup_email"><br>
                <input type="password" placeholder="Password" class="inputField" name="signup_password"><br>
                <button type="submit" class="submitButton" name="signup" value="Signup">Sign-up</button>
            </form>
            <form id="loginID" class="inputGroup" action="auth.php" method="post">
                <input type="text" placeholder="Email" class="inputField" name="signup_email">
                <input type="password" placeholder="Password" name="login_password">
                <button type="submit" class="submitButton" name="login" value="Login">Login</button>

            </form>
        </div>
    </div>
    <script>
        var x = document.getElementById("signupID");
        var y = document.getElementById("loginID");
        var z = document.getElementById("btn");

        function loginID(){
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function signupID(){
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0";
        }
    </script>

<h2>Signup</h2>
<form action="auth.php" method="post">
    Name: <input type="text"  name="signup_name"><br>
    Email: <input type="text"  name="signup_email"><br>
    Password: <input type="password" name="signup_password"><br>
    <input type="submit" name="signup" value="Signup">
</form>

<h2>Login</h2>
<form action="auth.php" method="post" >
    Email: <input type="text" name="login_email"><br>
    Password: <input type="password" name="login_password"><br>
    <input type="submit" name="login" value="Login">
</form>

</body>
</html>
