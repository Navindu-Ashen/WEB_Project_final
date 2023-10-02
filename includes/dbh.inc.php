<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hovoc_login_1";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection error: " .mysqli_connect_error());
}
