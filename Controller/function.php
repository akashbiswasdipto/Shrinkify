<?php
date_default_timezone_set('Asia/Dhaka');
session_start();
function linkshort($link, $conn){
    $count=0;
    while($count<1){
        $result =bin2hex(random_bytes(5));
        $query= "Select * from link_creation where MainLink = '$link'";
        $outcome = mysqli_query($conn, $query);
        if(mysqli_num_rows($outcome)>0)
        {
            $count=1;
            header('Location: ../index.php?LinkExists');
        }
        else{
            if(empty($_SESSION['user']['id'])){
                $query="INSERT INTO link_creation (Username,MainLink,Shortlink) VALUES ('Free','$link','$result')";
                $outcome = mysqli_query($conn, $query);
                $count=1;
                header('Location: ../index.php?Success='.$result);
            }
            else{
                $id=$_SESSION['user']['id'];
                $query="INSERT INTO link_creation (Username,MainLink,Shortlink) VALUES ('$id','$link','$result')";
                $outcome = mysqli_query($conn, $query);
                $query="INSERT INTO ".$id." (MainLink, Shortlink) VALUES ('$link','$result')";
                $outcome = mysqli_query($conn, $query);
                $count=1;
                header('Location: ../index.php?Success='.$result);
            }

        }
    }
}

function NewUser($email, $password, $conn)
{
    $query = "Select * from Shrinkfy_User where email = '$email'";
    $outcome = mysqli_query($conn, $query);
    if (mysqli_num_rows($outcome) > 0) {
        header("Location:../login.php?UserExists=True");
    } else {
        $flag = 0;
        while ($flag < 1) {
            $userid = 'shrinkify' . substr(md5(microtime()), rand(0, 26), 8);
            echo $userid;
            $query = 'Select * from Shrinkfy_User where userid = "' . $userid . '"';
            $outcome = mysqli_query($conn, $query);
            if (mysqli_num_rows($outcome) > 0) {
                $userid = 'shrinkify' . substr(md5(microtime()), rand(0, 26), 8);
            } else {
                $flag = 1;
            }
        }
        $query = "INSERT INTO Shrinkfy_User (email,password,userid,usertype) VALUES ('$email','$password','$userid','general')";
        $outcome = mysqli_query($conn, $query);
        createtable($userid, $conn);
    }
}

function createtable($userid,$conn){
    $query="CREATE TABLE $userid".'(
                sl INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              MainLink TEXT(16) NOT NULL,
              ShortLink TEXT(16) NOT NULL,
              date DATETIME DEFAULT CURRENT_TIMESTAMP
            )';
    if ($conn->query($query) === TRUE) {
        header("Location:../login.php?RegistrationSuccess=True");
    }
}

function verifyuser($email, $password, $conn)
{
    $query = "Select * from shrinkfy_user where email = '$email'";
    $outcome = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($outcome);
    if (mysqli_num_rows($outcome) > 0){
        if ($password==$row['password']) {

            $_SESSION['user'] = ['id'=>$row['userid'], 'email'=>$row['email'], 'type'=>$row['usertype'], 'status'=> 'Green'];
            $id=$row['userid'];
            $time=date('m/d/Y h:i:s a');
            $query="INSERT INTO session (user_id, session_start) values('$id', '$time')";
            $outcome = mysqli_query($conn, $query);
            header("Location:../User_Profile/user_profile.php?profile=".$row['userid']);
        } else {
            header('Location:../login.php?WrongPassword');
        }
    }
    else{
        header('Location:../login.php?WrongEmail');
    }

}
