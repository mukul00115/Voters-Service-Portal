<?php
session_start();
include 'includes/conn.php'; // Ensure this includes the code to connect to the database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voters_id = $_POST['voters_id'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords
    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match';
        header('Location: forgot_password.php');
        exit();
    }

    // Fetch the user's voters_id
    $stmt = $conn->prepare('SELECT * FROM voters_detail WHERE voters_id = ?');
    $stmt->bind_param('s', $voters_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Hash the new password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $stmt = $conn->prepare('UPDATE voters_detail SET password = ? WHERE voters_id = ?');
        $stmt->bind_param('ss', $hashed_password, $voters_id);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Your password has been reset';
            header('Location: index.php');
        } else {
            $_SESSION['error'] = 'Failed to reset password';
            header('Location: forgot_password.php');
        }
    } else {
        $_SESSION['error'] = 'Invalid Voter ID';
        header('Location: forgot_password.php');
    }
    exit();
}
?>
<?php include 'includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Reset Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            background-color: #F1E9D2;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #FFD194 0%, #D1913C 100%);
        }
        .login-box {
            width: 100%;
            max-width: 500px;
            padding: 30px;
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
            margin-bottom: 20px;
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
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #CCCCCC;
            padding: 15px;
            margin-bottom: 15px;
            font-size: 16px;
            padding-left: 40px;
        }
        .form-group {
            position: relative;
        }
        .form-group .form-control-feedback {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            pointer-events: none;
            color: #CCCCCC;
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
    </style>
</head>
<body>
    <div class="login-box">
        <div class="login-logo">
            <b>Online Voting System</b>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg"><i class="fa fa-key" style="margin-right: 8px;"></i> Reset Password</p>
            <form action="forgot_password.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="voters_id" placeholder="Voter's ID" required>
                    <span class="fa fa-id-card form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="New Password" required>
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password" required>
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-refresh"></i> Reset Password</button>
                    </div>
                </div>
            </form>
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
