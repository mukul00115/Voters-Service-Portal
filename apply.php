<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "votesystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $fathersname = $_POST['fathersname'];
    $mothersname = $_POST['mothersname'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $gender = $_POST['Gender'];
    $house = $_POST['house'];
    $street = $_POST['street'];
    $town = $_POST['town'];
    $pincode = $_POST['pincode'];
    $state = $_POST['States'];
    $parliamentary = $_POST['Parliamentary'];
    $district = $_POST['district'];
    $mobile = $_POST['mobile']; // New field
    $email = $_POST['email']; // New field

    $photo = $_FILES['photo'];
    $photoName = $photo['name'];
    $photoTmpName = $photo['tmp_name'];
    $photoError = $photo['error'];
    $photoSize = $photo['size'];

    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }

    if ($photoError === 0) {
        if ($photoSize < 500000) { // Limit photo size to 500KB
            $photoExt = pathinfo($photoName, PATHINFO_EXTENSION);
            $allowed = array('jpg', 'jpeg', 'png', 'gif');

            if (in_array($photoExt, $allowed)) {
                $photoNameNew = uniqid('', true) . "." . $photoExt;
                $photoDestination = $uploadDir . $photoNameNew;
                if (move_uploaded_file($photoTmpName, $photoDestination)) {
                    $voters_id = uniqid();
                    $password = password_hash($voters_id, PASSWORD_BCRYPT);

                    $sql = "INSERT INTO voters_detail (voters_id, password, firstname, lastname, fathersname, mothersname, age, dob, gender, house, street, town, pincode, state, parliamentary, district, email, mobile, photo) VALUES ('$voters_id', '$password', '$firstname', '$lastname', '$fathersname', '$mothersname', '$age', '$dob', '$gender', '$house', '$street', '$town', '$pincode', '$state', '$parliamentary', '$district', '$email', '$mobile', '$photoDestination')";

                    if ($conn->query($sql) === TRUE) {
                        // Return a JavaScript snippet to show the popup and redirect
                        echo "<script>
                            alert('New voter registered successfully');
                            window.location.href='index.php';
                            </script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Failed to move the uploaded file.";
                }
            } else {
                echo "Invalid file type.";
            }
        } else {
            echo "File size exceeds limit.";
        }
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Voter Registration Form">
    <meta name="author" content="Your Name">
    <meta name="keywords" content="Voter Registration">
    <!-- Link to the existing CSS file -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <!-- Link to the new responsive CSS file -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <title>Enter Your Details</title>
    <style>
        /* Optional error styling */
        .error {
            border: 1px solid red;
        }
        label > span {
            color: red; /* Make asterisks red */
            margin-left: 4px; /* Optional: Adjust spacing */
        }
    </style>
</head>
<body>
    <div class="page-wrapper">
        <div class="card">
            <div class="card-body">
                <ul class="tab-list">
                    <li class="tab-list__item active">
                        <a class="tab-list__link" href="#tab1">Mandatory Details</a>
                    </li>
                    <li class="tab-list__item">
                        <a class="tab-list__link" href="#tab2">Address</a>
                    </li>
                    <li class="tab-list__item">
                        <a class="tab-list__link" href="#tab3">Assembly Details</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="tab-pane active" id="tab1">
                            <div class="input-group">
                                <label>First Name <span>*</span></label>
                                <input type="text" name="firstname" placeholder="Enter Your First Name" required>
                            </div>
                            <div class="input-group">
                                <label>Last Name <span>*</span></label>
                                <input type="text" name="lastname" placeholder="Enter Your Last Name" required>
                            </div>
                            <div class="input-group">
                                <label>Father's Name <span>*</span></label>
                                <input type="text" name="fathersname" placeholder="Enter Your Father's Name" required>
                            </div>
                            <div class="input-group">
                                <label>Mother's Name <span>*</span></label>
                                <input type="text" name="mothersname" placeholder="Enter Your Mother's Name" required>
                            </div>
                            <div class="input-group">
                                <label>Age <span>*</span></label>
                                <input type="text" name="age" placeholder="Enter Your Age" required>
                            </div>
                            <div class="input-group">
                                <label>Date Of Birth <span>*</span></label>
                                <input type="date" name="dob" placeholder="Enter Your Date Of Birth" required>
                            </div>
                            <div class="input-group">
                                <label>Gender <span>*</span></label>
                                <select name="Gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label>Mobile Number <span>*</span></label>
                                <input type="text" name="mobile" placeholder="Enter Your Mobile Number" required>
                            </div>
                            <div class="input-group">
                                <label>Email ID <span>*</span></label>
                                <input type="email" name="email" placeholder="Enter Your Email ID" required>
                            </div>
                            <div class="input-group">
                                <label>Upload Photo <span>*</span></label>
                                <input type="file" name="photo" accept="image/*" required>
                            </div>
                            <div class="p-t-20">
                                <button type="button" class="btn next-btn">Next</button>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab2">
                            <div class="input-group">
                                <label>House Number <span>*</span></label>
                                <input type="text" name="house" placeholder="Enter Your House Number" required>
                            </div>
                            <div class="input-group">
                                <label>Street/Area/Locality <span>*</span></label>
                                <input type="text" name="street" placeholder="Enter Your Area/Locality" required>
                            </div>
                            <div class="input-group">
                                <label>Town/Village <span>*</span></label>
                                <input type="text" name="town" placeholder="Enter Your Town/Village" required>
                            </div>
                            <div class="input-group">
                                <label>Pincode <span>*</span></label>
                                <input type="text" name="pincode" placeholder="Enter Pincode" required>
                            </div>
                            <div class="input-group">
                                <label>State <span>*</span></label>
                                <select name="States" required>
                                    <option value="Andaman & Nicobar Islands">Andaman & Nicobar Islands</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chattisgarh">Chattisgarh</option>
                                    <option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
                                    <option value="Daman & Diu">Daman & Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                            <div class="p-t-20">
                                <button type="button" class="btn prev-btn">Previous</button>
                                <button type="button" class="btn next-btn">Next</button>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab3">
                            <div class="input-group">
                                <label>Parliamentary Constituency <span>*</span></label>
                                <input type="text" name="Parliamentary" placeholder="Enter Your Parliamentary Constituency" required>
                            </div>
                            <div class="input-group">
                                <label>District <span>*</span></label>
                                <input type="text" name="district" placeholder="Enter Your District" required>
                            </div>
                            <div class="p-t-20">
                                <button type="button" class="btn prev-btn">Previous</button>
                                <button type="submit" class="btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabLinks = document.querySelectorAll('.tab-list__link');
        const nextBtns = document.querySelectorAll('.next-btn');
        const prevBtns = document.querySelectorAll('.prev-btn');
        const tabs = document.querySelectorAll('.tab-pane');

        tabLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const target = this.getAttribute('href').substring(1);
                showTab(target);
            });
        });

        nextBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const currentTab = document.querySelector('.tab-pane.active');
                const inputs = currentTab.querySelectorAll('input[required], select[required], textarea[required]');
                let allFieldsFilled = true;

                inputs.forEach(input => {
                    if (input.value.trim() === '') {
                        allFieldsFilled = false;
                        input.classList.add('error'); // Optionally, you can add a class for styling purposes
                    } else {
                        input.classList.remove('error');
                    }
                });

                if (allFieldsFilled) {
                    const nextTab = currentTab.nextElementSibling;
                    if (nextTab) {
                        showTab(nextTab.id);
                    }
                } else {
                    // Optionally, you can display an error message or handle the UI to indicate missing fields
                    alert('Please fill in all mandatory fields.');
                }
            });
        });

        prevBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const currentTab = document.querySelector('.tab-pane.active');
                const prevTab = currentTab.previousElementSibling;
                if (prevTab) {
                    showTab(prevTab.id);
                }
            });
        });

        function showTab(tabId) {
            tabs.forEach(tab => {
                tab.classList.remove('active');
            });
            tabLinks.forEach(link => {
                link.parentNode.classList.remove('active');
            });
            document.getElementById(tabId).classList.add('active');
            document.querySelector(`a[href="#${tabId}"]`).parentNode.classList.add('active');
        }
    });
</script>
</body>
</html>
