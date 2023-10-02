<?php
    include_once '../includes/dbh.inc.php';
    
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM admins WHERE adminId = '$id';");
        header('location:adminPanelAdmins.php');
     }
   
?>