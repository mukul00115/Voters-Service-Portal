<?php
include 'includes/session.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action == 'approve') {
        // Function to generate a unique voter ID
        function generateVoterID() {
            $prefix = strtoupper(substr(uniqid(), 0, 3)); // First three letters in capitals
            $digits = mt_rand(1000000, 9999999); // 7 random digits
            return $prefix . $digits;
        }

        // Fetch the request details from the pending_voters table
        $sql = "SELECT * FROM pending_voters WHERE id = $id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Check for duplicate Aadhar number
            $aadhar = $row['aadhar'];
            $aadharCheckSQL = "SELECT * FROM voters_detail WHERE aadhar = '$aadhar'";
            $aadharCheckResult = $conn->query($aadharCheckSQL);

            if ($aadharCheckResult->num_rows > 0) {
                echo "<script>
                        alert('Aadhar already exists. Approval cancelled.');
                        window.location.href='new_requests.php';
                      </script>";
            } else {
                // Generate voter ID and password
                $voterID = generateVoterID();
                $dob = $row['dob'];
                $password = password_hash($dob, PASSWORD_BCRYPT);

                // Insert approved voter into the voters_detail table
                $insertDetailSQL = "INSERT INTO voters_detail (voters_id, password, firstname, lastname, fathersname, mothersname, age, dob, gender, house, street, town, pincode, state, parliamentary, district, email, mobile, photo, aadhar, aadharfile) 
                              VALUES ('$voterID', '$password', '" . $row['firstname'] . "', '" . $row['lastname'] . "', '" . $row['fathersname'] . "', '" . $row['mothersname'] . "', '" . $row['age'] . "', '" . $row['dob'] . "', '" . $row['gender'] . "', '" . $row['house'] . "', '" . $row['street'] . "', '" . $row['town'] . "', '" . $row['pincode'] . "', '" . $row['state'] . "', '" . $row['parliamentary'] . "', '" . $row['district'] . "', '" . $row['email'] . "', '" . $row['mobile'] . "', '" . $row['photo'] . "', '" . $row['aadhar'] . "', '" . $row['aadharfile'] . "')";

                if ($conn->query($insertDetailSQL) === TRUE) {
                    // Remove the record from pending_voters table after approval
                    $deleteSQL = "DELETE FROM pending_voters WHERE id = $id";
                    $conn->query($deleteSQL);

                    echo "<script>
                            alert('Request approved successfully. Voter ID: $voterID');
                            window.location.href='new_requests.php';
                          </script>";
                } else {
                    echo "Error: " . $insertDetailSQL . "<br>" . $conn->error;
                }
            }
        } else {
            echo "No record found for the given ID.";
        }
    } elseif ($action == 'reject') {
        // Remove the record from pending_voters table upon rejection
        $deleteSQL = "DELETE FROM pending_voters WHERE id = $id";

        if ($conn->query($deleteSQL) === TRUE) {
            echo "<script>
                    alert('Request rejected successfully.');
                    window.location.href='new_requests.php';
                  </script>";
        } else {
            echo "Error: " . $deleteSQL . "<br>" . $conn->error;
        }
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
