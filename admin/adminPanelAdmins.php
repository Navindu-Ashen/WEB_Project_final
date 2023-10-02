<?php
  include_once 'header.adm.php';
  include_once '../includes/dbh.inc.php';
  $select = mysqli_query($conn, "SELECT * FROM admins");

  function invalidaid($adminName){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$adminName)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
  }

  function aidExcist($conn, $adminName, $adminEmail){
    $sql = "SELECT * FROM admins WHERE adminName = ? OR adminEmail = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:adminPanelAdmins.php?error=stmtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $adminName, $adminEmail);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
  }

  function createAdmin($conn, $adminName, $adminEmail, $adminPassword){
      $sql = "INSERT INTO admins (adminName, adminEmail, adminPwd) VALUES (?, ?, ?);";

      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location:adminPanelAdmins.php?error=stmtfaild");
          exit();
      }

      mysqli_stmt_bind_param($stmt, "sss", $adminName, $adminEmail, $adminPassword);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("Location:adminPanelAdmins.php?error=none");
      exit();
  }

  if(isset($_POST["submit"])){
    $adminName = $_POST["adminname"];
    $adminEmail = $_POST["adminemail"];
    $adminPassword = $_POST["adminpwd"];

    $invalidaid = invalidaid($adminName);
    $aidExcist = aidExcist($conn, $adminName, $adminEmail);

    if($invalidaid !== false){
        header("Location:adminPanelAdmins.php?error=invalidadminname");
        exit();
    }

    if($aidExcist !== false){
        header("Location:adminPanelAdmins.php?error=adminnameexcists");
        exit();
    }

    createAdmin($conn, $adminName, $adminEmail, $adminPassword);
    
  }


?>
<link href="adminPanelAdmins.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
  <section class="U-section-adminPanelMens">
  <h2 class="U-section-heading"><center><a href="adminPanel.php" class="U-section-heading-anchor">ADMIN PANEL</a></center></h2>
    <form class="U-form-adminPanelMens" method="POST" action="adminPanelAdmins.php">
	  <h2 class="text-center">ADD A NEW ADMIN</h2>
    <div class="form-group" >
        <input type="text" name="adminname" class="form-control" placeholder="enter admin name" required>
	  </div>
      <div class="form-group">
        <input type="text" name="adminemail" class="form-control" placeholder="enter email" required>
	  </div>
		<div class="form-group">
        <input type="text" name="adminpwd" class="form-control" placeholder="enter password" required>
		</div>
      <button type="submit" name="submit" class="btn btn-primary">Add Admin</button>
    </form>
  <table width="98%" border="0" class="U-table">
  <thead class="U-table-head">
    <tr>
      <th class="U-table-heading1">Admin ID</th>
      <th class="U-table-heading2">Admin Name</th>
      <th class="U-table-heading3">Email</th>
      <th class="U-table-heading4">Password</th>
      <th class="U-table-heading7">Action</th>
    </tr>
  </thead>
  <thead class="U-table-head">
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
        <td><?php echo $row['adminId']; ?></td>
        <td><?php echo $row['adminName']; ?></td>
        <td><?php echo $row['adminEmail']; ?></td>
        <td><?php echo $row['adminPwd']; ?></td>
        <td>
            <a href="updateAdmin.adm.php?edit=<?php echo $row['adminId']; ?>" class="btn"> edit </a>
            <a href="deleteAdmin.adm.php?delete=<?php echo $row['adminId']; ?>" class="btn"> delete </a>
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

<script src="js/jquery-3.4.1.min.js"></script>

<script src="js/popper.min.js"></script> 
<script src="js/bootstrap-4.4.1.js"></script>
</body>
</html>