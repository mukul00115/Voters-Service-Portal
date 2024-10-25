<?php
include 'includes/session.php';

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $fathersname = $_POST['fathersname'];
    $mothersname = $_POST['mothersname'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $house = $_POST['house'];
    $street = $_POST['street'];
    $town = $_POST['town'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $parliamentary = $_POST['parliamentary'];
    $district = $_POST['district'];

    // Update voters_detail table
    $sql = "UPDATE voters_detail SET lastname = '$lastname', firstname = '$firstname', email = '$email', mobile = '$mobile', fathersname = '$fathersname', mothersname = '$mothersname', age = '$age', dob = '$dob', gender = '$gender', house = '$house', street = '$street', town = '$town', pincode = '$pincode', state = '$state', parliamentary = '$parliamentary', district = '$district' WHERE voters_id = '$id'";
    
    if($conn->query($sql)){
        $_SESSION['success'] = 'Voter updated successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select voter to edit first';
}

header('location: voters.php');
?>
