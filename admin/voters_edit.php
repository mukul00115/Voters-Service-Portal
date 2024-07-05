<?php
include 'includes/session.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE voters SET lastname = '$lastname', firstname = '$firstname', email = '$email', mobile = '$mobile', password = '$password' WHERE id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Voter updated successfully';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}
else{
    $_SESSION['error'] = 'Select voter to edit first';
}

header('location: voters.php');
?>
