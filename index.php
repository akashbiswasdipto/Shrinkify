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
    <link rel='stylesheet' href="css/home.css">
</head>
<body>
    <div class="searchbar">
        <h1>Making Long Links Short and Sweet</h1>
        <form method="POST" ACTION="Controller/web.php?linkshortner=home">
            <input type="text" name="largelink" class="inputlink" placeholder="URL getting out of hand? Not anymore..." required>
            <button type="submit" name="submit_home_link" class="submit_button">Shrinkify</button>
            <?php
                if(isset($_GET['Success'])){
                    $link=$_GET['Success'];
                    echo "<h5>Here’s Your Snack-Sized URL! : </h5> <h2>Shrinkify.com/".$link."</h2>";
                }
                elseif(isset($_GET['LinkExists'])){
                    echo "<h5>Your Snack-Sized URL Already Exists! Login To Get the Shorten Link. <a href='login.php'>Sign In</a></h5>";
                }
            ?>
        </form>
    </div>
</body>
</html>
