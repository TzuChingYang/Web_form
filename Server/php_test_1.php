<!DOCTYPE html>
<html>
<head>
    <title> Registration infomation </title>
    <style>

    </style>
</head>

<body style="background-image: url(background_1.jpg);">
<?php
// define variables and set to empty values
$usernameErr = $emailErr = $genderErr = $passwordErr = $birthdayErr = $colorErr = $agreementErr = "";
$username = $email = $gender = $password = $birthday = $color = $agreement = "";

//Below get data from html Save them in variables (username,password...etc)
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
<!-- To put those data in database(MySQL) -->
<!-- First need to connect to database -->
<?php
    //Basic setting
    $host="localhost" ;
    $db_username="tzching";
    $db_password="00000000";
    $db_name="RegistrationForm";

    //Construct connection
    $connect = new mysqli($host,$db_username,$db_password,$db_name);

    if(mysqli_connect_error()==true){
        die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }else{
        $sql="INSERT INTO MemberAccount(Username,Password,Birthday,Email,Gender,Color,Agreement)
        values ('$username','$password','$birthday','$email','$gender','$color','$agreement')";

        if($connect->query($sql)==true){
            echo "<p style='color: yellow'>New Account is inserted successfully</p>";
        }else{
            echo "<h1 style='color: white;'>Registration Fault: </h1>" ;
            echo "<h2 style='color: white;'>Please try again and Below is something you miss</h2>";

        }
        $connect->close();
    }

?>

<!-- Show variables which store data from html file -->
<hr>
<h2 style="color: yellow"> Username: <h3 style="color: red"><?php echo $username . $usernameErr?></h3> </h2>
<h2 style="color: yellow"> Password: <h3 style="color: red"><?php echo $password . $passwordErr?></h3>  </h2>
<h2 style="color: yellow"> Birthday: <h3 style="color: red"><?php echo $birthday . $birthdayErr?></h3>  </h2>
<h2 style="color: yellow"> Email: <h3 style="color: red"><?php echo $email . $emailErr?></h3>  </h2>
<h2 style="color: yellow"> Gender: <h3 style="color: red"><?php echo $gender . $genderErr ?></h3>  </h2>
<h2 style="color: yellow"> Color: <h3 style="color: red"><?php echo $color . $colorErr?></h3>  </h2>
<h2 style="color: yellow"> Agreement: <h3 style="color: red"><?php echo $agreement . $agreementErr?></h3></h2><br>
<input type="button" value="Previous" onclick="location.href='http://localhost:8888/form_exercise.php'">

<hr>

</body>
</html>