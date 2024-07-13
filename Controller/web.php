<?php
include_once('env.php');
include_once ('function.php');

if(isset($_GET['linkshortner'])=="home"){
    if(isset($_POST['submit_home_link'])){
        $link=$_POST['largelink'];
        linkshort($link, $con);
    }
}

if(isset($_GET['Login'])=="NewUser"){
    if(isset($_POST['submit_user_link'])){
        if($_POST['user_pass']==$_POST['user_passc']){
            $user=$_POST['user_email'];
            $userp=$_POST['user_pass'];
            NewUser($user, $userp, $con);
        }
        else{
            header('location: ../signup.php?Password=Error');
        }
    }
}

if(isset($_GET['Login'])=="UserExists") {
    if (isset($_POST['submit_login_link'])) {
        $user = $_POST['user_email'];
        $userp = $_POST['user_pass'];
        verifyuser($user, $userp, $con);
    }
}

if(isset($_GET['Logout'])){
    if($_GET['Logout']=="User"){
        session_start();
    session_destroy();
    header('location: ../index.php');
    }
}