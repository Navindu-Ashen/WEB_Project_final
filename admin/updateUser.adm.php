<?php
  include_once 'header.adm.php';
  include_once '../includes/dbh.inc.php';

  $userId = $_GET["edit"];

if(isset($_POST["updateUser"])){

    $username = $_POST["usernameupd"];
    $email = $_POST["useremailupd"];
    $password = $_POST["userpwdupd"];
    $contactNumber = $_POST["usercontactnumupd"];
    $address = $_POST["addressupd"];

   if(empty($username) || empty($email) || empty($password) || empty($contactNumber) || empty($address)){
      $message[] = 'please fill out all!';    
   }else{
      
      $update_data = "UPDATE users SET userName='$username', email='$email', pwd='$password', contactNumber='$contactNumber', address='$address'  WHERE userId ='$userId'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         header('location:adminPanelUsers.php');
      }else{
         $message[] = 'please fill out all!'; 
      }

   }
}

?>

<link href="adminPanelUsers.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
  <section class="U-section-adminPanelMens">

    <?php
      
      $select = mysqli_query($conn, "SELECT * FROM users WHERE userId = '$userId';");
      while($row = mysqli_fetch_assoc($select)){

   ?>

    <form class="U-form-adminPanelMens" method="POST" action="updateUser.adm.php?edit=<?php echo $userId; ?>">
	  <h2 class="text-center">ADD A NEW USER</h2>
<div class="form-group">
        <input type="text" name="usernameupd" class="form-control" placeholder="enter user name" value="<?php echo $row['userName']; ?>" required>
	  </div>
      <div class="form-group">
        <input type="text" name="useremailupd" class="form-control" placeholder="enter email" value="<?php echo $row['email']; ?>" required>
	  </div>
		<div class="form-group">
        <input type="text" name="userpwdupd" class="form-control" placeholder="enter password" value="<?php echo $row['pwd']; ?>" required>
		</div>
		<div class="form-group">
        <input type="text" name="usercontactnumupd" class="form-control" placeholder="enter contact number" value="<?php echo $row['contactNumber']; ?>" required>
		</div>
		<div class="form-group">
        <input type="text" name="addressupd" class="form-control" placeholder="enter user's address" value="<?php echo $row['address']; ?>" required>
		</div>
        <button type="submit" name="updateUser" class="btn btn-primary">Update User</button>
        <p></p>
        <a href="adminPanelUsers.php"  class="btn btn-primary">Go back</a>
</div>
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