<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";
$dbname = "tp"; // Add your database name here

// Create connection
$connect = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Success connecting to the db";

// Retrieve form data
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$other = $_POST['desc'];

// SQL query
$sql = "INSERT INTO `trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `other`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp())";
// echo $sql;

// // Execute the query
if ($connect->query($sql) === true) {
    // echo "Successfully connected";
    $insert = true;
} else {
    echo "ERROR: " . $sql . "<br>" . $connect->error;
}

// // Close connection
$connect->close();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Website</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="collegePic.webp" alt="PCTE">
    <div class="container">
        <h1>Welcome to PCTE Shimla Travel Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert === true){
        echo "<p class='submitmsg'>Thanks for Submitting the form,We are excited to have you for our Shimla Trip.</p>";
        }
    ?>
        <form action="app.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email ID">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any further detail here"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
    <script src="index.js"></script>

</body>
</html>
