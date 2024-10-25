<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>National Voters Service Portal</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
        @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600');

        /* General Styling */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Source Sans Pro', sans-serif;
            color: white;
            background: url('images/download.png') no-repeat center center fixed; /* Replace with your actual image URL */
            background-size: cover; /* Ensures the background image covers the entire screen */
            background-attachment: fixed; /* Keeps the background fixed during scroll */
        }

        #banner {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Text shadow for better readability */
        }

        .inner {
            text-align: center;
            padding: 3rem; /* Increased padding */
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent black background */
            border-radius: 10px;
            width: 90%; /* Increased width */
            max-width: 1400px; /* Increased maximum width */
        }

        header h1 {
            font-size: 3.5rem; /* Increased font size */
            font-weight: bold;
            margin-bottom: 1rem; /* Space below the title */
            color: lightgreen; /* Light green color for the title */
            text-shadow: none; /* Remove the shadow effect */
        }

        header hr {
            border: 1px solid lightgreen; /* Light green horizontal line */
            width: 80%; /* Line width relative to the box */
            margin: 1rem auto; /* Centered with spacing above and below */
        }

        .btn-container {
            margin-top: 2rem; /* Space above the buttons */
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn {
            border-radius: 50px; /* Rounded corners */
            padding: 15px 30px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
            background-color: black; /* Black background */
            border: 2px solid lightgreen; /* Light green border */
            color: lightgreen; /* Light green text */
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 250px; /* Ensure buttons are of consistent width */
            margin: 10px; /* Add margin for spacing between buttons */
        }

        .btn i {
            margin-right: 10px; /* Space between icon and text */
        }

        .btn:hover {
            background-color: lightgreen; /* Light green background on hover */
            color: black; /* Black text on hover */
            transform: scale(1.05);
        }

        footer {
            background-color: rgba(0, 0, 0, 0.8); /* Slightly darker footer background */
            color: lightgreen; /* Changed to light green for better visibility */
            padding: 1rem 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
        }

        footer .copyright {
            margin: 0 auto;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header h1 {
                font-size: 2.5rem;
            }

            .btn {
                font-size: 1rem;
                padding: 10px 20px;
                width: auto; /* Remove fixed width on smaller screens */
            }
        }
    </style>
</head>
<body>
    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <header>
                <h1>National Voter's Service Portal</h1>
                <hr />
            </header>

            <div class="btn-container">
                <a href="apply.php" class="btn btn-lg"><i class="fa fa-id-card"></i> Apply For Voter ID</a>
                <a href="search.php" class="btn btn-lg"><i class="fa fa-search"></i> Search Your Voter ID</a>
                <a href="admin/login.php" class="btn btn-lg"><i class="fa fa-shield"></i> Admin Login</a>
                <a href="login.php" class="btn btn-lg"><i class="fa fa-users"></i> Voter Login</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; 2024 National &nbsp Voter's &nbsp  Service &nbsp  Portal.&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Site is designed and maintained by Mukul Kumar.
            </div>
        </div>
    </footer>
</body>
</html>
