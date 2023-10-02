<?php
  include_once 'header.php';
  include_once 'includes/dbh.inc.php';

  $select = mysqli_query($conn, "SELECT * FROM womenproducts");

?>

<h1 class="text-center"><strong>WOMEN'S WEAR</strong></h1>
<div class="container-fluid">
    <div class="row">
    <?php while($row = mysqli_fetch_assoc($select)){ ?>
      
      <div class="col-xl-4">
		  <h3><center><?php echo $row['productNameWomen']; ?></center></h3>
        <div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="admin/uploaded_img/women/<?php echo $row['productPic1Women']; ?>" alt="Product 1">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center; color: #CD8D34;">Rs <?php echo $row['productPriceWomen']; ?></h5>
            <p class="card-text" style="text-align: center;"><?php echo $row['productDescriptionWomen']; ?><br><br></p>
            <a href="productWomen.php?productId=<?php echo $row['productIdWomen']; ?>" name="buynow" class="btn btn-primary" style="background-color: ">BUY NOW</a> 
          </div>
        </div>
      </div>
      <?php } ?>
    </div>

<?php
  include_once 'footer.php';
?>
</div>