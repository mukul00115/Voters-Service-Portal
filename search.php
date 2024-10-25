<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Search Voter Details">
    <meta name="author" content="Your Name">
    <title>Search Form</title>

    <!-- Inline Bootstrap CSS and custom styles -->
    <style>
        body {
            background-image: url('images/22.jpeg');
            background-size: cover;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            transition: all 0.3s ease;
        }
        .btn {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
            display: block;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .input-group {
            position: relative;
            margin-bottom: 20px;
        }
        .input--style-1 {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: calc(100% - 22px);
            font-size: 16px;
        }
        .input-group-symbol {
            position: absolute;
            right: 15px;
            top: 10px;
        }
        .details {
            text-align: left;
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .details h3 {
            margin-top: 0;
        }
        .details img {
            display: block;
            margin-top: 10px;
        }
        .details p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="container">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "votesystem";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $voter_id = $_POST['voter_id']; // Corrected line

            // Query to fetch voter details
            $sql = "SELECT * FROM voters_detail WHERE voters_id = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("s", $voter_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Voter details found
                    $row = $result->fetch_assoc();
                    $details_found = true;
                    $voter_details = $row;
                } else {
                    // No details found
                    $details_found = false;
                }
                $stmt->close();
            } else {
                echo "Error preparing statement: " . $conn->error;
            }
            $conn->close();
        }
        ?>

        <?php if (isset($details_found)): ?>
            <div class="details">
                <?php if ($details_found): ?>
                    <h3>Voter Details Found</h3>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($voter_details['firstname'] . " " . $voter_details['lastname']); ?></p>
                    <p><strong>Father's Name:</strong> <?php echo htmlspecialchars($voter_details['fathersname']); ?></p>
                    <p><strong>Mother's Name:</strong> <?php echo htmlspecialchars($voter_details['mothersname']); ?></p>
                    <p><strong>Age:</strong> <?php echo htmlspecialchars($voter_details['age']); ?></p>
                    <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($voter_details['dob']); ?></p>
                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($voter_details['gender']); ?></p>
                    <p><strong>House:</strong> <?php echo htmlspecialchars($voter_details['house']); ?></p>
                    <p><strong>Street:</strong> <?php echo htmlspecialchars($voter_details['street']); ?></p>
                    <p><strong>Town:</strong> <?php echo htmlspecialchars($voter_details['town']); ?></p>
                    <p><strong>Pincode:</strong> <?php echo htmlspecialchars($voter_details['pincode']); ?></p>
                    <p><strong>State:</strong> <?php echo htmlspecialchars($voter_details['state']); ?></p>
                    <p><strong>Parliamentary:</strong> <?php echo htmlspecialchars($voter_details['parliamentary']); ?></p>
                    <p><strong>District:</strong> <?php echo htmlspecialchars($voter_details['district']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($voter_details['email']); ?></p>
                    <p><strong>Mobile:</strong> <?php echo htmlspecialchars($voter_details['mobile']); ?></p>
                    <?php if (!empty($voter_details['photo'])): ?>
                        <p><strong>Photo:</strong></p>
                        <?php
                            $photo_path = $voter_details['photo'];
                            // Check if the photo path already contains "images/" prefix
                            if (strpos($photo_path, 'images/') === false) {
                                $photo_path = 'images/' . $photo_path;
                            }
                        ?>
                        <img src="<?php echo htmlspecialchars($photo_path); ?>" alt="Voter Photo" style="width:100px;height:100px;">
                    <?php endif; ?>
                <?php else: ?>
                    <h3>Details Not Found</h3>
                    <p>No voter details found for the provided Voter ID.</p>
                <?php endif; ?>
                <a href="search.php" class="btn" style="width: 200px; margin: 20px auto;">Back to Search</a>
            </div>
        <?php else: ?>
            <div class="search-box">
                <form action="" method="POST">
                    <div class="input-group">
                        <label class="label">Voter ID</label>
                        <input class="input--style-1" type="text" name="voter_id" placeholder="Enter Your Voter ID" required>
                    </div>
                    <button class="btn" type="submit">Search</button>
                </form>
                <a href="track_request.html" style="display: block; text-align: center; margin-top: 20px;">Track Your Request</a>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>
