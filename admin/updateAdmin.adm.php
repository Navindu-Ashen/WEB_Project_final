<?php
  include_once 'header.adm.php';
  include_once '../includes/dbh.inc.php';

  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    if (isset($_POST['updateadmin'])) {
        $name = $_POST['adminnameupd'];
        $email = $_POST['adminemailupd'];
        $password = $_POST['adminpwdupd'];

        //to prevent sql injection
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $password = $conn->real_escape_string($password);

        //sql code to update data in the database
        $query = "UPDATE `admins` SET adminName='$name', adminEmail='$email', adminPwd='$password' WHERE adminId='$id';";

        //execute the query
        if ($conn->query($query) === false) {
            echo ("Admins updating failed! query failed!");
        } else {
            header('location: adminPanelAdmins.php');
        }
    }
} else {
    echo "Invalid request. 'editId' parameter not found.";
}

?>

<link href="adminPanelAdmins.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
  <section class="U-section-adminPanelMens">
  <?php
      
      $select = mysqli_query($conn, "SELECT * FROM admins WHERE adminId = '$id';");
      while($row = mysqli_fetch_assoc($select)){

   ?>
    
  <form class="U-form-adminPanelMens" method="POST" action="updateAdmin.adm.php?edit=<?php echo $id; ?>">
	  <h2 class="text-center">UPDATE ADMIN</h2>
    <div class="form-group" >
        <input type="text" name="adminnameupd" class="form-control" placeholder="enter admin name" value="<?php echo $row['adminName']; ?>" required>
	  </div>
      <div class="form-group">
        <input type="text" name="adminemailupd" class="form-control" placeholder="enter email" value="<?php echo $row['adminEmail']; ?>" required>
	  </div>
		<div class="form-group">
        <input type="text" name="adminpwdupd" class="form-control" placeholder="enter password" value="<?php echo $row['adminPwd']; ?>" required>
		</div>
      <button type="submit" name="updateadmin" class="btn btn-primary">Update Admin</button>
      <p></p>
        <a href="adminPanelAdmins.php"  class="btn btn-primary">Go back</a>
    </form>

    <?php } ?>

  </section>




  <?php
    include_once 'footer.adm.php';
  ?>
</div>
<!-- body code goes here -->


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>