<?php
    include_once ('Controller/env.php');
    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href="css/navbar.css">
    <title>Shrinkify-Less is More</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="index.php"><img src="elements/decor_images/logo.png" class="logo_image"></a>
        </div>
        <?php if(empty($_SESSION['user']['id'])){
            ?>
            <div class="navbar_button">
                <a href="signup.php">Sign Up</a>
                <a href="login.php">Sign In</a>
            </div>
        <?php
        }
        else{
            ?>
            <div class="navbar_button">
                <a href="User_Profile/user_profile.php"><?php echo $_SESSION['user']['email']; ?></a>
                <a href="Controller/web.php?Logout=User">Log Out</a>
            </div>
        <?php
        }
        ?>


    </div>
</body>
</html>
