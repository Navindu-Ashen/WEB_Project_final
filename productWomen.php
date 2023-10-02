<?php
  include_once 'header.php';
  include_once 'includes/dbh.inc.php';

    if(isset($_SESSION["userid"])){
        $uname = $_SESSION["userid"];
        $select = mysqli_query($conn, "SELECT * FROM users WHERE userId='$uname'");
        $rowSelect = mysqli_fetch_assoc($select);

    }else if(isset($_SESSION["adminId"])){
        $uname = $_SESSION["adminId"];
        $select = mysqli_query($conn, "SELECT * FROM admins WHERE adminId='$uname'");
        $rowSelect = mysqli_fetch_assoc($select);
    }else{
        header('location: login.php');
    }

    if (isset($_GET['productId'])) {
        $id = $_GET['productId'];
        $select = mysqli_query($conn, "SELECT * FROM womenproducts WHERE productIdWomen=$id");
        $row = mysqli_fetch_assoc($select);
    }else{
        echo "faild";
    }

  
?>


<link href="productCss.css" rel="stylesheet" type="text/css">
<div class="container-fluid">
<section>
    <div class="row">
      <div class="col-xl-6">
        <div class="U-div1"> <img src="admin/uploaded_img/women/<?php echo $row['productPic1Women']; ?>" alt="" width="750" height="1125" class="U-product-img"/></div>
      </div>
<div class="col-xl-6 U-div2">
        <h2><center><?php echo $row['productNameWomen']; ?></center></h2>
        <p class="text-center U-div2-p"><?php echo $row['productDescriptionWomen']; ?></p>
        <h3 class="text-center"><?php echo $row['productPriceWomen']; ?> LKR</h3>
	    <form>
	      <div class="form-group">
	        <label for="exampleInputEmail1">User Name</label>
	        <input type="text" class="form-control" placeholder="Enter user name" value="<?php echo $rowSelect['userName'];?>" required > </div>
		  <div class="form-group">
	        <label for="exampleInputEmail1">Email</label>
	        <input type="email" class="form-control" placeholder="Enter email" value="<?php echo $rowSelect['email'];?>" required> </div>
		  <div class="form-group">
	        <label for="exampleInputEmail1">Contact number</label>
			  <input type="text" class="form-control" placeholder="Enter contact number" value="<?php echo $rowSelect['contactNumber'];?>" required> </div>
		  <div class="form-group">
	        <label for="exampleInputEmail1">Shipping Address</label>
	        <input type="email" class="form-control" placeholder="Enter address" value="<?php echo $rowSelect['address'];?>" required> </div>


	      <a href="#popup1" type="submit" class="btn btn-primary U-buynow-button">BUY NOW</a>
        </form>
</div>
    </div>
</section>
<?php
  include_once 'footer.php';
?>
</div>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.4.1.js"></script>



<div id="popup1" class="overlay">
	<div class="popup">
		<h2>your order is pleaced</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
      Order will deleverd to : <?php echo $rowSelect['address'];?> within 3 - 4 business days.<br><br>
			Thankyou for shopping with HOVOC clothing.
		</div>
    <a href="shopWomen.php" class="btn U-exit-button">Exit</a>
	</div>
</div>


</body></h1>
</html>

