<?php
  include_once 'header.adm.php';
  include_once '../includes/dbh.inc.php';
  $select = mysqli_query($conn, "SELECT * FROM admins");
  $row = mysqli_fetch_assoc($select);
?>
<link href="adminPanel.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
  <section>
    <h1 class="U-section-heading">ADMIN PANEL</h1>
    <p class="U-section-paragraph"><strong>Admin Name: <?php echo $_SESSION["adminName"] ?><br>
      Admin Email: <?php echo $_SESSION["adminEmail"] ?></strong></p>
<div class="U-section-tablecontainer">
	  <table width="90%" border="0" class="U-section-table">
  <tbody>
    <tr>
      <td><a href="adminPanelMens.php"><button type="button" class="btn btn-lg">&nbsp;&nbsp;&nbsp;Men's Wear&nbsp;&nbsp;&nbsp;</button></a></td>
      <td><a href="adminPanelWomens.php"><button type="button" class="btn btn-lg">Women's Wear</button></a></td>
    </tr>
    <tr>
      <td><a href="adminPanelUsers.php"><button type="button" class="btn btn-lg">Users</button></a></td>
      <td><a href="adminPanelAdmins.php"><button type="button" class="btn btn-lg">Admins</button></a></td>
    </tr>
  </tbody>
</table>
</div>
	  
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