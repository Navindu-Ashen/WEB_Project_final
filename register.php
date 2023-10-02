<?php
  include_once 'header.php'
?>
<link href="register.css" rel="stylesheet" type="text/css">

<div class="container-fluid">
  <section class="u-section1-body">
    <div class="wrapper">
    
    <div class="form-box register">
    <h2>Registration</h2>
    <form action="includes/register.inc.php" method="POST">
        <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="uname" required>
            <label>Username</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon></span>
            <input type="email" name="email" required>
            <label>Email</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
            <input type="password" name="pwd" required>
            <label>Password</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="contactNum" required>
            <label>Contact Number</label>
        </div>
        <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon></span>
            <input type="text" name="address" required>
            <label>Address</label>
        </div>
        <div class="remember-forgot">
            <label><input type="checkbox">I agree to the terms & conditions
                </label>
            
            </div>
            <button type="submit" name="submit" class="btn">Register</button>
            <div class="login-register">
                <p>Already have an account?<a href="login.php" class="login-link">Login</a></p>
                </div>
                
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
</body>
</html>