<?php
    session_start();
    include 'includes/header.php';
    include 'includes/conn.php'; // Ensure you have a file that handles your database connection

    if(isset($_POST['reset'])){
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $captcha = $_POST['captcha'];

        // Verify CAPTCHA
        if($captcha != $_SESSION['captcha']){
            $_SESSION['error'] = 'CAPTCHA verification failed';
            header('location: forgot_password.php');
            exit();
        }

        $query = $conn->prepare("SELECT * FROM admin WHERE email = ? AND mobile = ?");
        $query->bind_param("ss", $email, $mobile);
        $query->execute();
        $result = $query->get_result();

        if($result->num_rows > 0){
            // Logic to send reset password email/SMS here
            $_SESSION['success'] = 'Password reset instructions have been sent to your email and mobile number';
        } else {
            $_SESSION['error'] = 'No account found with the provided email and mobile number';
        }
    }
?>

<body class="hold-transition login-page" style="background-color:#F8F9FA;">
<div class="login-box" style="background-color:#FFFFFF; color:#333333; font-size: 18px; font-family: 'Arial', sans-serif; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 20px;">
    <div class="login-logo" style="color:#333333; font-size: 24px; font-family: 'Arial', sans-serif;">
        <b>Online Voting System</b>
    </div>

    <div class="login-box-body" style="color:#333333; font-size: 18px; font-family: 'Arial', sans-serif;">
        <p class="login-box-msg" style="color:#555555; font-size: 16px; font-family: 'Arial', sans-serif; display: flex; align-items: center; justify-content: center;">
            <i class="fa fa-unlock-alt" style="margin-right: 8px;"></i> Forgot Password
        </p>

        <form action="forgot_password.php" method="POST">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" required style="border-radius: 5px; border: 1px solid #CCCCCC; padding: 10px;">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="mobile" placeholder="Mobile Number" required style="border-radius: 5px; border: 1px solid #CCCCCC; padding: 10px;">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="captcha" placeholder="Enter CAPTCHA" required style="border-radius: 5px; border: 1px solid #CCCCCC; padding: 10px;">
                <img src="captcha.php" alt="CAPTCHA Image" style="margin-top: 10px;">
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #007BFF; color: white; font-size: 14px; border-radius: 5px; border: none; padding: 10px 0;" name="reset"><i class="fa fa-paper-plane"></i> Send Reset Instructions</button>
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
        if(isset($_SESSION['success'])){
            echo "
                <div class='callout callout-success text-center mt20' style='margin-top: 20px; padding: 10px; background-color: #D4EDDA; color: #155724; border: 1px solid #C3E6CB; border-radius: 5px;'>
                    <p>".$_SESSION['success']."</p> 
                </div>
            ";
            unset($_SESSION['success']);
        }
    ?>
</div>

<?php include 'includes/scripts.php' ?>
</body>
</html>
