<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="login.css">
    <title>Signup/Login</title>
</head>

<body>
    <div class="header">
        <h1>Welcome to Valencia Medical</h1>
    </div>

    <?php if(isset($_SESSION['flash_message'])): ?>
        <div class="message">
            <?php 
                echo $_SESSION['flash_message']; 
                unset($_SESSION['flash_message']);
            ?>
        </div>
    <?php endif; ?>

    <div class="valencia">
        <div class="formBox">
            <div class="tabs">
                <button class="tabButton active" onclick="showTab('signupID')">Sign-up</button>
                <button class="tabButton" onclick="showTab('loginID')">Login</button>
            </div>

            <form id="signupID" class="inputGroup" action="auth.php" method="post">
            <input type="text" placeholder="Name" class="inputField" name="signup_name">
                <input type="email" placeholder="Email" class="inputField" name="signup_email" required>
                <input type="password" placeholder="Password" class="inputField" name="signup_password" required>
                <button type="submit" class="submitButton" name="signup">Sign-up</button>
            </form>

            <form id="loginID" class="inputGroup hidden" action="auth.php" method="post">
                <input type="email" placeholder="Email" class="inputField" name="login_email" required>
                <input type="password" placeholder="Password" class="inputField" name="login_password" required>
                <button type="submit" class="submitButton" name="login">Login</button>
            </form>
        </div>
    </div>

    <script>
        function showTab(id) {
            var forms = document.getElementsByClassName('inputGroup');
            for(var i = 0; i < forms.length; i++) {
                forms[i].classList.add('hidden');
            }
            document.getElementById(id).classList.remove('hidden');

            var buttons = document.getElementsByClassName('tabButton');
            for(var i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove('active');
            }
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>
