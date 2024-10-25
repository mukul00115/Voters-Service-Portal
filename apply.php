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
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $aadhar = $_POST['aadhar'];

    $photo = $_FILES['photo'];
    $photoName = $photo['name'];
    $photoTmpName = $photo['tmp_name'];
    $photoError = $photo['error'];
    $photoSize = $photo['size'];

    $aadharFile = $_FILES['aadharfile'];
    $aadharFileName = $aadharFile['name'];
    $aadharFileTmpName = $aadharFile['tmp_name'];
    $aadharFileError = $aadharFile['error'];
    $aadharFileSize = $aadharFile['size'];

    if (strlen($mobile) != 10 || !ctype_digit($mobile)) {
        echo "<script>alert('Mobile number must be exactly 10 digits.');</script>";
    } elseif (strlen($aadhar) != 12 || !ctype_digit($aadhar)) {
        echo "<script>alert('Aadhar number must be exactly 12 digits.');</script>";
    } elseif ($photoError !== 0 || $aadharFileError !== 0) {
        echo "<script>alert('Error uploading files.');</script>";
    } elseif ($photoSize > 500000 || $aadharFileSize > 500000) {
        echo "<script>alert('File size exceeds limit of 500KB.');</script>";
    } else {
        $uploadDir = 'images/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $photoExt = pathinfo($photoName, PATHINFO_EXTENSION);
        $aadharFileExt = pathinfo($aadharFileName, PATHINFO_EXTENSION);
        $allowed = array('jpg', 'jpeg', 'png', 'gif', 'pdf');

        if (in_array($photoExt, $allowed) && in_array($aadharFileExt, $allowed)) {
            $photoNameNew = uniqid('', true) . "." . $photoExt;
            $aadharFileNameNew = uniqid('', true) . "." . $aadharFileExt;
            $photoDestination = $uploadDir . $photoNameNew;
            $aadharFileDestination = $uploadDir . $aadharFileNameNew;

            if (move_uploaded_file($photoTmpName, $photoDestination) && move_uploaded_file($aadharFileTmpName, $aadharFileDestination)) {
                // Debugging statements
                echo "Photo uploaded to: " . $photoDestination . "<br>";
                echo "Aadhar uploaded to: " . $aadharFileDestination . "<br>";

                $voters_id = uniqid();
                $password = password_hash($voters_id, PASSWORD_BCRYPT);

                $sql = "INSERT INTO pending_voters (firstname, lastname, fathersname, mothersname, age, dob, gender, house, street, town, pincode, state, parliamentary, district, email, mobile, photo, aadhar, aadharfile) VALUES ('$firstname', '$lastname', '$fathersname', '$mothersname', '$age', '$dob', '$gender', '$house', '$street', '$town', '$pincode', '$state', '$parliamentary', '$district', '$email', '$mobile', '$photoDestination', '$aadhar', '$aadharFileDestination')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>
                        alert('New voter registered successfully');
                        window.location.href='index.php';
                        </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Failed to move the uploaded files.";
                echo "Photo tmp path: " . $photoTmpName . "<br>";
                echo "Aadhar tmp path: " . $aadharFileTmpName . "<br>";
            }
        } else {
            echo "<script>alert('Invalid file type.');</script>";
        }
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
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <title>Enter Your Details</title>
    <style>
        .error {
            border: 1px solid red;
        }
        label > span {
            color: red;
            margin-left: 4px;
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
                    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                                <label>Aadhar Number <span>*</span></label>
                                <input type="text" name="aadhar" placeholder="Enter Your Aadhar Number" required>
                            </div>
                            <div class="input-group">
                                <label>Upload Aadhar <span>*</span></label>
                                <input type="file" name="aadharfile" accept="image/*,application/pdf" required>
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

    function validateForm() {
        const mobileInput = document.querySelector('input[name="mobile"]');
        const aadharInput = document.querySelector('input[name="aadhar"]');
        const mobileValue = mobileInput.value.trim();
        const aadharValue = aadharInput.value.trim();

        if (mobileValue.length !== 10 || isNaN(mobileValue)) {
            alert('Mobile number must be exactly 10 digits.');
            return false;
        }

        if (aadharValue.length !== 12 || isNaN(aadharValue)) {
            alert('Aadhar number must be exactly 12 digits.');
            return false;
        }

        return true;
    }
</script>
</body>
</html>
