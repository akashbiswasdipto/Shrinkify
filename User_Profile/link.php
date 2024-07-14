<?php
include_once('../Controller/env.php');
session_start();
include_once ('header.php');
if(empty($_SESSION['user']['id'])){
header('location:../login.php');
}
else{
if($_SESSION['user']['status']=="Green"){
$userid = $_SESSION['user']['id'];
$query='SELECT * FROM '.$userid;
$outcome = mysqli_query($con, $query);
$result=mysqli_fetch_assoc($outcome);
}
else{
session_destroy();
header('location:../login.php');
}
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <body>

    </body>
    </html>
<?php
}
?>
