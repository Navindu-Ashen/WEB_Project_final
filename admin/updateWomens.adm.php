<?php
  include_once 'header.adm.php';
  include_once '../includes/dbh.inc.php';

  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    if (isset($_POST['updatewomen'])) {
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productDescription = $_POST['productDescription'];
        $product_image = $_FILES['productImage']['name'];
        $product_image_tmp_name = $_FILES['productImage']['tmp_name'];
        $product_image_folder = 'uploaded_img/women/'.$product_image;

        //to prevent sql injection
        $productName = $conn->real_escape_string($productName);
        $productPrice = $conn->real_escape_string($productPrice);
        $productDescription = $conn->real_escape_string($productDescription);

        //sql code to update data in the database
        $query = "UPDATE `womenproducts` SET productNameWomen='$productName', productPriceWomen='$productPrice', productDescriptionWomen='$productDescription', productPic1Women='$product_image' WHERE productIdWomen='$id';";

        //execute the query
        if ($conn->query($query) === false) {
            echo ("Admins updating failed! query failed!");
        } else {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            header('location: adminPanelWomens.php');
        }
    }
} else {
    echo "Invalid request. 'editId' parameter not found.";
}

?>
<link href="adminPanelWomens.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
  <section class="U-section-adminPanelMens">
  <h2 class="U-section-heading"><center><a href="adminPanel.php" class="U-section-heading-anchor">ADMIN PANEL</a></center></h2>
    
  <?php
      
      $select = mysqli_query($conn, "SELECT * FROM womenproducts WHERE productIdWomen = '$id';");
      while($row = mysqli_fetch_assoc($select)){

   ?>

  <form class="U-form-adminPanelMens" action="updateWomens.adm.php?edit=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
	  <h2 class="text-center">UPDATE PRODUCT</h2>
		<p class="text-center">( Women's Wear )</p>
    <div class="form-group">
        <input type="text" name="productName" class="form-control" placeholder="enter product name" value="<?php echo $row['productNameWomen']; ?>" required>
	  </div>
      <div class="form-group">
        <input type="number" name="productPrice" class="form-control" placeholder="enter product price" value="<?php echo $row['productPriceWomen']; ?>" required>
	  </div>
		<div class="form-group">
        <input type="text" name="productDescription" class="form-control" placeholder="enter product description" value="<?php echo $row['productDescriptionWomen']; ?>" required>
		</div>
		<div class="form-group">
        <input type="file" name="productImage" class="form-control" accept="image/png, image/jpeg, image/jpg" required>
		</div>
      <button type="submit" name="updatewomen" class="btn btn-primary">Update Product</button>
      <p></p>
        <a href="adminPanelWomens.php"  class="btn btn-primary">Go back</a>
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