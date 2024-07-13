<?php

$username="root";
$password="";
$host="localhost";
$database="shrinkify";

$con=mysqli_connect($host,$username,$password,$database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}