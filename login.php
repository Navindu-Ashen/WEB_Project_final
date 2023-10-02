<?php
  include_once 'header.php';
?>
<div class="container-fluid">
  <section class="u-section1-body">
    <div class="wrapper">
    
    <div class="form-box login">
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="POST">
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
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                </div>
                <button type="submit" name="submit" class="btn" >Login</button>
                <div class="login-register">
                    <p>Don't have an account?<a href="register.php" class="register-link">Register</a></p>
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