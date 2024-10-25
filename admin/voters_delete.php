<?php
include 'includes/session.php';

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    // Delete from voters_detail table
    $sql = "DELETE FROM voters_detail WHERE voters_id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Voter deleted successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Select item to delete first';
}

header('location: voters.php');
?>
