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
    <h1>SignUp to Shrinkify</h1>
    <form method="POST" action="Controller/web.php?Login=NewUser">
        <input type="email" name="user_email" class="input_box" placeholder="Email Address" required><br>
        <input type="password" name="user_pass" class="input_box" placeholder="Password" required><br>
        <input type="password" name="user_passc" class="input_box" placeholder="Confirm Password" required><br>
        <button type="submit" name="submit_user_link" class="submit_button">Sign Up</button>
    </form>
    <?php
        if(isset($_GET['Password'])){
            if($_GET['Password']=="Error"){
                echo"<h5>The password and the confirmation password doesn't match, try again.</h5>";
            }
        }
    ?>
</div>
</body>
</html>