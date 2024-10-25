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

    // New fields
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
    $aadhar = $_POST['aadhar'];
    $aadharfile = $_FILES['aadharfile']['name'];

    if(!empty($filename)){
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);
    }
    else{
        $filename = 'profile.jpg';
    }

    if(!empty($aadharfile)){
        move_uploaded_file($_FILES['aadharfile']['tmp_name'], '../images/'.$aadharfile);
    }
    
    if($conn->query($sql)){
        // Insert into voters_detail table
        $detailSql = "INSERT INTO voters_detail (voters_id, password, firstname, lastname, fathersname, mothersname, age, dob, gender, house, street, town, pincode, state, parliamentary, district, email, mobile, photo, aadhar, aadharfile) 
                      VALUES ('$voters_id', '$password', '$firstname', '$lastname', '$fathersname', '$mothersname', '$age', '$dob', '$gender', '$house', '$street', '$town', '$pincode', '$state', '$parliamentary', '$district', '$email', '$mobile', '$filename', '$aadhar', '$aadharfile')";
        
        if($conn->query($detailSql)){
            $_SESSION['success'] = 'Voter added successfully';
        } else {
            $_SESSION['error'] = $conn->error;
        }
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
