<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location: admin/home.php');
    exit();
}

if (isset($_SESSION['voter'])) {
    header('location: home.php');
    exit();
}
?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F8F9FA;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
        }
        .login-box {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            background-color: #FFFFFF;
            color: #333333;
            font-size: 18px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .login-logo {
            color: #333333;
            font-size: 24px;
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin-bottom: 10px;
        }
        .login-box-body {
            color: #333333;
            font-size: 18px;
            padding: 15px;
        }
        .login-box-msg {
            color: #555555;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #CCCCCC;
            padding: 15px; 
            margin-bottom: 15px;
            font-size: 16px; 
        }
        .btn-primary, .btn-secondary {
            border-radius: 5px;
            padding: 10px 0;
            font-size: 14px;
            border: none;
            color: white;
        }
        .btn-primary {
            background-color: #007BFF;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6C757D;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .callout {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .callout-danger {
            color: #721C24;
            background-color: #F8D7DA;
            border: 1px solid #F5C6CB;
        }
        .apply-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .apply-link a {
            color: #007BFF;
            text-decoration: none;
        }
        .apply-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="login-logo">
            <b>Online Voting System</b>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg"><i class="fa fa-user" style="margin-right: 8px;"></i> Voter's Login</p>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="identifier" placeholder="Voter's ID or Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                    </div>
                    <div class="col-6">
                        <a href="forgot_password.php" class="btn btn-secondary btn-block"><i class="fa fa-lock"></i> Forgot Password</a>
                    </div>
                </div>
            </form>
            <div class="apply-link">
                <a href="apply.php">Apply for Voter ID</a>
            </div>
        </div>
        <?php
        if (isset($_SESSION['error'])) {
            echo "
                <div class='callout callout-danger text-center mt20'>
                    <p>".$_SESSION['error']."</p> 
                </div>
            ";
            unset($_SESSION['error']);
        }
        ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>
</html>
