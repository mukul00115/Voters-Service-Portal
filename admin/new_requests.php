<?php
include 'includes/session.php';
include 'includes/header.php';
?>

<style>
    /* Navbar styling to align items to the right */
    .navbar-nav {
        /* margin-left: auto; */
    }

    /* Styling for the new requests section */
    .new-requests-container {
        background-color: #FFF;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 20px;
        overflow-x: auto;
    }

    .page-title {
        font-size: 24px;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .request-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: auto;
        margin-top: 20px;
    }

    .request-table th,
    .request-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .request-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .btn-approve,
    .btn-reject {
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-approve {
        background-color: #28a745;
        color: white;
    }

    .btn-approve:hover {
        background-color: #218838;
    }

    .btn-reject {
        background-color: #dc3545;
        color: white;
    }

    .btn-reject:hover {
        background-color: #c82333;
    }

    @media (max-width: 768px) {
        .request-table th,
        .request-table td {
            font-size: 12px;
        }
        .page-title {
            font-size: 20px;
        }
    }

    /* Additional styling for photo column */
    .request-table img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        
        <?php include 'includes/menubar.php'; ?>
        <?php include 'includes/navbar.php'; ?>

        <div class="content-wrapper">
            <div class="container">
                <section class="content">
                    <div class="new-requests-container">
                        <h2 class="page-title">New Requests</h2>
                        <?php
                        // Fetch new requests from the database
                        $sql = "SELECT * FROM pending_voters";
                        $query = $conn->query($sql);

                        if ($query->num_rows > 0) {
                            echo '<table class="request-table">';
                            echo '<tr><th>First Name</th><th>Last Name</th><th>Father\'s Name</th><th>Mother\'s Name</th><th>Age</th><th>Date of Birth</th><th>Gender</th><th>House</th><th>Street</th><th>Town</th><th>Pincode</th><th>State</th><th>Parliamentary</th><th>District</th><th>Email</th><th>Mobile</th><th>Photo</th><th>Aadhar</th><th>Aadhar File</th><th>Action</th></tr>';

                            while ($row = $query->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['firstname']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['lastname']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['fathersname']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['mothersname']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['age']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['dob']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['gender']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['house']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['street']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['town']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['pincode']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['state']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['parliamentary']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['district']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['mobile']) . '</td>';

                                // Display the photo with corrected path
                                $photoPath = 'http://localhost/votesystem/' . htmlspecialchars($row['photo']);
                                echo '<td><a href="' . $photoPath . '" target="_blank">View File</a></td>';

                                // Display the aadhar
                                echo '<td>' . htmlspecialchars($row['aadhar']) . '</td>';

                                // Display the aadhar file link with corrected path
                                $aadharFilePath = 'http://localhost/votesystem/' . htmlspecialchars($row['aadharfile']);
                                echo '<td><a href="' . $aadharFilePath . '" target="_blank">View File</a></td>';

                                echo '<td>';
                                echo '<button class="btn-approve" onclick="handleApprove(' . $row['id'] . ')">Approve</button>';
                                echo '<button class="btn-reject" onclick="handleReject(' . $row['id'] . ')">Reject</button>';
                                echo '</td>';
                                echo '</tr>';
                            }

                            echo '</table>';
                        } else {
                            echo '<p>No new requests.</p>';
                        }
                        ?>
                    </div>
                </section>
            </div>
        </div>
        <?php include 'includes/scripts.php'; ?>
        <?php include 'includes/footer.php'; ?>
    </div>

    <script>
        function handleApprove(id) {
            if (confirm('Are you sure you want to approve this request?')) {
                window.location.href = 'handle_request.php?action=approve&id=' + id;
            }
        }

        function handleReject(id) {
            if (confirm('Are you sure you want to reject this request?')) {
                window.location.href = 'handle_request.php?action=reject&id=' + id;
            }
        }
    </script>

</body>
</html>
