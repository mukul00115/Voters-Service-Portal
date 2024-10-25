<?php
    include 'includes/session.php';

    if(isset($_POST['upload'])){
        $id = $_POST['id'];
        $filename = $_FILES['photo']['name'];
        
        // Absolute path to the images directory
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/votesystem/images/';
        $target_file = $target_dir . basename($filename);

        if(!empty($filename)){
            // Check if the images directory exists and is writable
            if(is_dir($target_dir) && is_writable($target_dir)){
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)){
                    $sql = "UPDATE voters_detail SET photo = '$filename' WHERE voters_id = '$id'";

                    if($conn->query($sql)){
                        $_SESSION['success'] = 'Photo updated successfully';
                    } else {
                        $_SESSION['error'] = 'Failed to update photo: ' . $conn->error;
                    }
                }
                else{
                    $_SESSION['error'] = 'Failed to upload photo';
                }
            } else {
                $_SESSION['error'] = 'Images directory does not exist or is not writable';
            }
        }
        else{
            $_SESSION['error'] = 'Please select a photo to upload';
        }
    }
    else{
        $_SESSION['error'] = 'Select voter to update photo first';
    }

    header('location: voters.php');
?>
