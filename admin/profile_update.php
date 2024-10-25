<?php
// profile_update.php

include 'includes/session.php';

if (isset($_POST['save'])) {
    // Sanitize and validate the input data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $curr_password = mysqli_real_escape_string($conn, $_POST['curr_password']);
    
    // Check if the current password matches the one in the database
    $sql = "SELECT * FROM admin WHERE id = '".$_SESSION['admin']."'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();
    
    if (password_verify($curr_password, $row['password'])) {
        // Handle file upload
        $filename = $_FILES['photo']['name'];
        if (!empty($filename)) {
            $target_directory = '../images/';  // Adjusted the path to save in the root images directory
            $target_file = $target_directory . basename($filename);

            // Ensure the target directory exists
            if (!is_dir($target_directory)) {
                mkdir($target_directory, 0777, true);
            }

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                $filename = basename($filename);
            } else {
                $_SESSION['error'] = 'Failed to upload the photo.';
                header('location: ' . $_GET['return']);
                exit();
            }
        } else {
            $filename = $row['photo'];
        }

        // Encrypt the password if it's changed
        if ($password == $row['password']) {
            $password = $row['password'];
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }

        // Update the database
        $sql = "UPDATE admin SET 
                    username = '$username', 
                    email = '$email', 
                    firstname = '$firstname', 
                    lastname = '$lastname', 
                    mobile = '$mobile', 
                    password = '$password', 
                    photo = '$filename' 
                WHERE id = '".$_SESSION['admin']."'";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Profile updated successfully';
        } else {
            $_SESSION['error'] = $conn->error;
        }
    } else {
        $_SESSION['error'] = 'Incorrect current password';
    }
} else {
    $_SESSION['error'] = 'Fill up profile form first';
}

header('location: ' . $_GET['return']);
?>
