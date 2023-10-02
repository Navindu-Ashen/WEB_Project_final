<?php
    include_once '../includes/dbh.inc.php';
    
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM menproducts WHERE productIdMen = '$id';");
        header('location:adminPanelMens.php');
     }
   
?>