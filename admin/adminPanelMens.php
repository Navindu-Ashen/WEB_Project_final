<?php
  include_once 'header.adm.php';
  include_once '../includes/dbh.inc.php';
  $select = mysqli_query($conn, "SELECT * FROM menproducts");

if(isset($_POST['submit'])){

   $product_name = $_POST['productName'];
   $product_price = $_POST['productPrice'];
   $product_description = $_POST['productDescription'];
   $product_image = $_FILES['productImage']['name'];
   $product_image_tmp_name = $_FILES['productImage']['tmp_name'];
   $product_image_folder = 'uploaded_img/men/'.$product_image;

   if(empty($product_name) || empty($product_price) || empty($product_image || empty($product_description))){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO menproducts(productNameMen, productPriceMen, productDescriptionMen, productPic1Men) VALUES('$product_name', '$product_price', '$product_description', '$product_image');";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'new product added successfully';
         header('location:adminPanelMens.php');
      }else{
         $message[] = 'could not add the product';
      }
   }

};

?>
<link href="adminPanelMens.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
  <section class="U-section-adminPanelMens">
  <h2 class="U-section-heading"><center><a href="adminPanel.php" class="U-section-heading-anchor">ADMIN PANEL</a></center></h2>


    <form class="U-form-adminPanelMens" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	  <h2 class="text-center">ADD A NEW PRODUCT</h2>
		<p class="text-center">( Men's Wear )</p>
    <div class="form-group">
        <input type="text" name="productName" class="form-control" placeholder="enter product name" required>
	  </div>
      <div class="form-group">
        <input type="number" name="productPrice" class="form-control" placeholder="enter product price" required>
	  </div>
		<div class="form-group">
        <input type="text" name="productDescription" class="form-control" placeholder="enter product description" required>
		</div>
		<div class="form-group">
        <input type="file" name="productImage" class="form-control" accept="image/png, image/jpeg, image/jpg" required>
		</div>
      <button type="submit" name="submit" class="btn btn-primary">Add Product</button>
    </form>
  <table width="98%" border="0" class="U-table">
  <tbody class="U-table-head">
    <tr>
      <th class="U-table-heading1">Product Image</th>
      <th class="U-table-heading2">Product Name</th>
      <th class="U-table-heading3">Product Description</th>
      <th class="U-table-heading4">Product Price</th>
      <th class="U-table-heading5">Action</th>
    </tr>
  
    <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/men/<?php echo $row['productPic1Men']; ?>" height="100" alt=""></td>
            <td><?php echo $row['productNameMen']; ?></td>
            <td><?php echo $row['productDescriptionMen']; ?></td>
            <td>Rs <?php echo $row['productPriceMen']; ?>/-</td>
            <td>
               <a href="updateMens.adm.php?edit=<?php echo $row['productIdMen']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="deleteProductMen.adm.php?delete=<?php echo $row['productIdMen']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
    <?php } ?>
  </tbody>
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