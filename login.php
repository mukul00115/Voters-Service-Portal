<?php
session_start();
include 'includes/conn.php'; // Make sure this includes the code to connect to the database

if (isset($_POST['login'])) {
    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    // Prepare the SQL query to select the user by Voter's ID or Email
    $sql = "SELECT * FROM voters WHERE voters_id = ? OR email = ?";

    // Prepare and execute the query
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the SQL query
        $stmt->bind_param('ss', $identifier, $identifier); // 'ss' means two string parameters

        // Execute the statement
        $stmt->execute();

        // Get the result of the query
        $result = $stmt->get_result();

        // Check if a matching user was found
        if ($voter = $result->fetch_assoc()) {
            // Verify the password
            if (password_verify($password, $voter['password'])) {
                // Password is correct, start the session for the user
                $_SESSION['voter'] = $voter['id'];
                header('location: home.php');
            } else {
                // Incorrect password
                $_SESSION['error'] = 'Incorrect password';
                header('location: index.php');
            }
        } else {
            // No user found with the given Voter's ID or Email
            $_SESSION['error'] = 'No user found with that Voter ID or Email';
            header('location: index.php');
        }

        // Close the statement
        $stmt->close();
    } else {
        // If the SQL preparation fails, show an error
        $_SESSION['error'] = 'Database error: Unable to prepare statement';
        header('location: index.php');
    }

    // Close the database connection
    $conn->close();
} else {
    $_SESSION['error'] = 'Please fill up the login form first';
    header('location: index.php');
}
?>
