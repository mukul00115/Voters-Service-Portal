<?php
include 'includes/session.php';

if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    if ($action == 'approve') {
        // Generate a unique voter ID with the format XXX#########
        function generateVoterID() {
            $prefix = strtoupper(substr(uniqid(), 0, 3)); // First three letters in capitals
            $digits = mt_rand(1000000, 9999999); // 7 random digits
            return $prefix . $digits;
        }

        $sql = "SELECT * FROM pending_voters WHERE id = $id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $voterID = generateVoterID();
            $password = password_hash($voterID, PASSWORD_BCRYPT);

            // Insert approved voter into the voters_detail table
            $insertSQL = "INSERT INTO voters_detail (voters_id, password, firstname, lastname, fathersname, mothersname, age, dob, gender, house, street, town, pincode, state, parliamentary, district, email, mobile, photo) 
                          VALUES ('$voterID', '$password', '" . $row['firstname'] . "', '" . $row['lastname'] . "', '" . $row['fathersname'] . "', '" . $row['mothersname'] . "', '" . $row['age'] . "', '" . $row['dob'] . "', '" . $row['gender'] . "', '" . $row['house'] . "', '" . $row['street'] . "', '" . $row['town'] . "', '" . $row['pincode'] . "', '" . $row['state'] . "', '" . $row['parliamentary'] . "', '" . $row['district'] . "', '" . $row['email'] . "', '" . $row['mobile'] . "', '" . $row['photo'] . "')";

            if ($conn->query($insertSQL) === TRUE) {
                // Remove the record from pending_voters table after approval
                $deleteSQL = "DELETE FROM pending_voters WHERE id = $id";
                $conn->query($deleteSQL);

                echo "<script>
                        alert('Request approved successfully. Voter ID: $voterID');
                        window.location.href='new_requests.php';
                      </script>";
            } else {
                echo "Error: " . $insertSQL . "<br>" . $conn->error;
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
