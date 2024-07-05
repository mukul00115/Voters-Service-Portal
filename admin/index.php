<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page" style="background-color:#F8F9FA;">
<div class="login-box" style="background-color:#FFFFFF; color:#333333; font-size: 18px; font-family: 'Arial', sans-serif; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 20px;">
  	<div class="login-logo" style="color:#333333; font-size: 24px; font-family: 'Arial', sans-serif;">
  		<b>Online Voting System</b>
  	</div>
  
  	<div class="login-box-body" style="color:#333333; font-size: 18px; font-family: 'Arial', sans-serif;">
        <p class="login-box-msg" style="color:#555555; font-size: 16px; font-family: 'Arial', sans-serif; display: flex; align-items: center; justify-content: center;">
            <i class="fa fa-user-circle" style="margin-right: 8px;"></i> Admin Login
        </p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Username" required style="border-radius: 5px; border: 1px solid #CCCCCC; padding: 10px;">
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required style="border-radius: 5px; border: 1px solid #CCCCCC; padding: 10px;">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-6">
          			<button type="submit" class="btn btn-primary btn-block" style="background-color: #007BFF; color: white; font-size: 14px; border-radius: 5px; border: none; padding: 10px 0;" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
        		<div class="col-xs-6">
          			<a href="forgot_password.php" class="btn btn-secondary btn-block" style="background-color: #6C757D; color: white; font-size: 14px; border-radius: 5px; border: none; padding: 10px 0;"><i class="fa fa-unlock-alt"></i> Forgot Password</a>
        		</div>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20' style='margin-top: 20px; padding: 10px; background-color: #F8D7DA; color: #721C24; border: 1px solid #F5C6CB; border-radius: 5px;'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>
