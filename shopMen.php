<?php
  include_once 'header.php';
  include_once 'includes/dbh.inc.php';

  $select = mysqli_query($conn, "SELECT * FROM menproducts");

?>

<h1 class="text-center"><strong>MEN'S WEAR</strong></h1>
<div class="container-fluid">
    <div class="row">

    <?php while($row = mysqli_fetch_assoc($select)){ ?>
      
      <div class="col-xl-4">
		  <h3><center><?php echo $row['productNameMen']; ?></center></h3>
        <div class="card col-md-4 col-xl-12"> <img class="card-img-top" src="admin/uploaded_img/men/<?php echo $row['productPic1Men']; ?>" alt="Product 1">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center; color: #CD8D34;">Rs <?php echo $row['productPriceMen']; ?></h5>
            <p class="card-text"><?php echo $row['productDescriptionMen']; ?><br><br></p>
            <a href="productMen.php?productId=<?php echo $row['productIdMen']; ?>" name="buynow" class="btn btn-primary">BUY NOW</a> 
          </div>
        </div>
      </div>

      <?php } ?>

    </div>

<?php
  include_once 'footer.php';
?>

</div>