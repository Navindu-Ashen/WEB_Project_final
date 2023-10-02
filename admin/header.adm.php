<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="../images/hococ_baselogo.png" type="image/x-icon">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOVOC Clothing</title>
    <!-- Bootstrap -->
	<link href="../css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="myStyle.css" rel="stylesheet" type="text/css">
  <!-- <link href="adminPanel.css" rel="stylesheet" type="text/css">
  <link href="adminPanelAdmins.css" rel="stylesheet" type="text/css">
  <link href="adminPanelMens.css" rel="stylesheet" type="text/css">
  <link href="adminPanelUsers.css" rel="stylesheet" type="text/css">
  <link href="adminPanelWomens.css" rel="stylesheet" type="text/css"> -->
  <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/allan:n7:default;acme:n4:default.js" type="text/javascript"></script>
</head>
  <body>
<header class="u-header">
  <nav class="navbar navbar-expand-lg navbar-light bg-light"> <a class="navbar-brand" href="../index.php"><img src="../images/sitehederlogoplain.png" alt="HOVOC logo" width="192" height="51" class="img-fluid"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse u-allign-center" id="navbarSupportedContent2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"> <a class="nav-link" href="../shopMen.php">Shop Men</a></li>
        <li class="nav-item"> <a class="nav-link" href="../shopWomen.php">Shop Women</a></li>
        <li class="nav-item"> <a class="nav-link" href="../aboutUs.php">About Us</a></li>
        <li class="nav-item"> <a class="nav-link" href="#">Contact Us</a></li>
        
        <?php
            if(isset($_SESSION["username"])){
                echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown2"> <a class="dropdown-item" href="../includes/logout.inc.php">Logout</a> 
                                                                                    <a class="dropdown-item" href="">'.$_SESSION["username"].'</a> </div> ';
                                                                                    
                
            }else if(isset($_SESSION["adminName"])){
              echo '<li class="nav-item"> <a class="nav-link" href="../includes/logout.inc.php">Logout</a></li>';
                                                                                  
              
            }else{
                echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown2"> <a class="dropdown-item" href="../login.php">Login</a> <a class="dropdown-item" href="../register.php">SignUp</a></div>';
            }
        
        ?>
          
        </li>
      </ul>
      <div>
        <form>
          <a href="#"><img src="../images/facebook.png" alt="fb logo" width="30" height="30" class="img-fluid"/></a>&nbsp; <a href="#"><img src="../images/twitter.png" alt="twitter logo" width="30" height="30" class="img-fluid"/></a> &nbsp; <a href="#"><img src="../images/instagram.png" alt="insta logo" width="30" height="30" class="img-fluid"/></a>&nbsp;
        </form>
      </div>
    </div>
</nav>
  &nbsp;</header>