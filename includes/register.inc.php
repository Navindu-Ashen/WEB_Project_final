<?php

if(isset($_POST["submit"])){
    $username = $_POST["uname"];
    $email = $_POST["email"];
    $password = $_POST["pwd"];
    $contactNumber = $_POST["contactNum"];
    $address = $_POST["address"];

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    $invalidUid = invalidUid($username);
    $uidExcist = uidExcist($conn, $username, $email);

    if($invalidUid !== false){
        header("Location: ../register.php?error=invalidusername");
        exit();
    }

    if($uidExcist !== false){
        header("Location: ../register.php?error=usernameexcists");
        exit();
    }

    createUser($conn, $username, $email, $password, $contactNumber, $address);
    

}
else{
    header('Location:../register.php');
}