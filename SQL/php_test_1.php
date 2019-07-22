<!DOCTYPE html>
<html>
<head>
    <title> Registration info </title>
    <style>

    </style>
</head>

<body>

<?php
// define variables and set to empty values
$usernameErr = $emailErr = $genderErr = $passwordErr = $birthdayErr = $colorErr = $agreementErr = "";
$username = $email = $gender = $password = $birthday = $color = $agreement = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $usernameErr="";
        $username = $_POST["username"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $emailErr="";
        $email = $_POST["email"];
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $passwordErr="";
        $password = $_POST["password"];
    }

    if (empty($_POST["birthday"])) {
        $birthdayErr = "Birthday is required";
    } else {
        $birthdayErr="";
        $birthday = $_POST["birthday"];
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $genderErr="";
        $gender = $_POST["gender"];
    }

    if (empty($_POST["color"])) {
        $colorErr = "Color is required";
    } else {
        $colorErr ="";
        $color = $_POST["color"];
    }

    if (empty($_POST["agreement"])) {
        $agreementErr = "Agreement is required";
    } else {
        $agreementErr="" ;
        $agreement = $_POST["agreement"];
    }
}
?>


<h2> Username: </h2><?php echo $username . $usernameErr?> <br>
<h2> Password: </h2><?php echo $password . $passwordErr?> <br>
<h2> Birthday: </h2><?php echo $birthday . $birthdayErr?> <br>
<h2> Email: </h2><?php echo $email . $emailErr?> <br>
<h2> Gender: </h2><?php echo $gender . $genderErr ?> <br>
<h2> Color: </h2><?php echo $color . $colorErr?> <br>
<h2> Agreement: </h2><?php echo $agreement . $agreementErr?> <br>

</body>
</html>