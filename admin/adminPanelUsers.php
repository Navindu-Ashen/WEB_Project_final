<?php
  include_once 'header.adm.php';
  include_once '../includes/dbh.inc.php';
  $select = mysqli_query($conn, "SELECT * FROM users");

  function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
  }

  function uidExcist($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE userName = ? OR email = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:adminPanelUsers.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
  }

  function createUser($conn, $username, $email, $password, $contactNumber, $address){
      $sql = "INSERT INTO users (userName, email, pwd, contactNumber, address) VALUES (?, ?, ?, ?, ?);";

      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location:adminPanelUsers.php?error=stmtfaild");
          exit();
      }

      mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $password, $contactNumber, $address);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("Location:adminPanelUsers.php?error=none");
      exit();
  }

  if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["useremail"];
    $password = $_POST["userpwd"];
    $contactNumber = $_POST["usercontactnum"];
    $address = $_POST["address"];


    $invalidUid = invalidUid($username);
    $uidExcist = uidExcist($conn, $username, $email);

    if($invalidUid !== false){
        header("Location:adminPanelUsers.php?error=invalidusername");
        exit();
    }

    if($uidExcist !== false){
        header("Location:adminPanelUsers.php?error=usernameexcists");
        exit();
    }

    createUser($conn, $username, $email, $password,  $contactNumber, $address);
    
  }

?>

<link href="adminPanelUsers.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
  <section class="U-section-adminPanelMens">
  <h2 class="user-heading"><center><a href="adminPanel.php" class="user-heading-anchor">ADMIN PANEL</a></center></h2>
    <form class="U-form-adminPanelMens" method="POST" action="adminPanelUsers.php">
	  <h2 class="text-center">ADD A NEW USER</h2>
<div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="enter user name" required>
	  </div>
      <div class="form-group">
        <input type="text" name="useremail" class="form-control" placeholder="enter email" required>
	  </div>
		<div class="form-group">
        <input type="text" name="userpwd" class="form-control" placeholder="enter password" required>
		</div>
		<div class="form-group">
        <input type="text" name="usercontactnum" class="form-control" placeholder="enter contact number" required>
		</div>
		<div class="form-group">
        <input type="text" name="address" class="form-control" placeholder="enter user's address" required>
		</div>
      <button type="submit" name="submit" class="btn btn-primary">Add User</button>
    </form>
  <table width="98%" border="0" class="U-table">
    <thead class="U-table-head">
      <tr>
        <th class="U-table-heading1">User ID</th>
        <th class="U-table-heading2">User Name</th>
        <th class="U-table-heading3">Email</th>
        <th class="U-table-heading4">Password</th>
        <th class="U-table-heading5">Contact Number</th>
        <th class="U-table-heading6">Address</th>
        <th class="U-table-heading7">Action</th>
      </tr>
    </thead>
    <thead class="U-table-head">
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
        <td><?php echo $row['userId']; ?></td>
        <td><?php echo $row['userName']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['pwd']; ?></td>
        <td><?php echo $row['contactNumber']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td>
          <a href="updateUser.adm.php?edit=<?php echo $row['userId']; ?>" class="btn"><i class="fas fa-edit"></i> edit </a>
          <a href="deleteUser.adm.php?delete=<?php echo $row['userId']; ?>" class="btn"><i class="fas fa-edit"></i> delete </a>
        </td>
      </tr>
      <?php } ?>
    </thead>

</table>

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