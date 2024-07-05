<?php
include 'includes/session.php';

if(isset($_POST['add'])){
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $voters_id = $_POST['voters_id'];
    $filename = $_FILES['photo']['name'];
    
    if(!empty($filename)){
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);
    }
    else{
        $filename = 'profile.jpg';
    }

    $sql = "INSERT INTO voters (lastname, firstname, email, mobile, password, voters_id, photo) VALUES ('$lastname', '$firstname', '$email', '$mobile', '$password', '$voters_id', '$filename')";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Voter added successfully';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}
else{
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: voters.php');
?>
