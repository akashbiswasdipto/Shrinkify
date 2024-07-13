<?php
include_once ('header.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href="css/login.css">
</head>
<body>
    <div class="login_box">
        <?php
        if(isset($_GET['RegistrationSuccess'])){
            if($_GET['RegistrationSuccess'] == "True"){
                echo "Your account has been registered successfully. Login to the world of Shrinkify";
            }
        }
        if(isset($_GET['UserExists'])){
            if($_GET['UserExists'] == "True"){
                echo "Your account is already registered. Login to the world of Shrinkify";
            }
        }
        ?>
        <h1>Login to Shrinkify</h1>
        <form method="POST" action="Controller/web.php?Login=UserExists">
            <input type="email" name="user_email" class="input_box" placeholder="Email Address" required>
            <?php
            if(isset($_GET['WrongEmail'])){
                echo '<script>alert("Whoops! Email Doesn’t Match.")</script>';
            }
            ?><br>
            <input type="password" name="user_pass" class="input_box" placeholder="Password" required>
            <?php
                if(isset($_GET['WrongPassword'])){
                        echo '<script>alert("Whoops! Password Doesn’t Match.")</script>';
                }
            ?><br>
            <button type="submit" name="submit_login_link" class="submit_button">Login</button>
        </form>
    </div>
</body>
</html>