<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Web_form</title>

</head>
<body style="background-image: url(background_1.jpg);">
    <h1 style="color:yellow;font-size:60px;font-family: 'Apple Chancery'">Registration form !</h1>
    <p style="font-size: 30px;color:red">Please key in your information </p>
    <p style="font-size: 30px;color:red">press <q><ins style="background-color: #76b852"><a href="#Form">REGISTER!</a></ins></q> to register your account</p>
    <p style="font-size: 30px;color:red">press <q><ins style="background-color: #76b852"><a href="login_page.php">LOGIN!</a></ins></q> to login your account</p>
    <p style="font-size: 30px;color:red">press <q><ins style="background-color: #76b852"><a href="logout_page.php">LOGOUT!</a></ins></q> to logout your account</p>

    <hr>
    <a href="#Form" style="font-size: 30px;background-color: lightgreen" title="Jump to form">Here is our form</a>
    <br><br>
    <a href="#Member" style="font-size: 30px;background-color: lightgreen" title="Jump to Member">Check member who join us!</a>
    <hr>

    <h1 id="Form" style="color: yellow;">Registration</h1>
    <form target="_self" action="php_test_1.php" method="post">
        <p style="color: yellow">Username: <input type="text" name="username">  </p>
        <p style="color: yellow">Password:  <input type="password" name="password"></p>
        <p style="color: yellow">Birthday: <input type="date" name="birthday"> </p>
        <p style="color: yellow">Email: <input type="email" name="email"> </p>
        <p style="color: yellow">Gender: <br><input type="radio" name="gender" value="male" checked> Male </p>
        <p style="color: yellow"><input type="radio" name="gender" value="female"> Female </p>
        <p style="color: yellow"><input type="radio" name="gender" value="other"> Other </p>
        <p style="color: yellow">Favorite Color: </p> <input type="color" name="color">
        <p style="color: yellow"><input type="checkbox" name="agreement" value="agree"> I <strong><q>Agree</q></strong> to put my information on the website below.(Member)</p>
        <p style="color: yellow"><input type="submit" value=" REGISTER !"></p><br>

    </form>

    <hr>
    <!-- Here to use php list all the Member / Catch data from db-->
    <h1 id="Member" style="color: yellow">Member list</h1><br>
    <?php
        $server ="localhost";
        $username ="tzching";
        $password ="00000000";
        $db_name ="RegistrationForm";

        // Connect to server(database) -> Check success or not
        $con = new mysqli($server,$username,$password,$db_name);
        if ($con->connect_error){
            die("Connect fault: ". $con->connect_errno);
        }

        // Fetch Data
        $sql="Select * from MemberAccount";
        $query = $con->query($sql);

        ?>



    <table style="border:3px #FFD382 dashed;" cellpadding="20" border='1'>
        <tr>
            <th style="color: red;font-size: 30px;background-color: #FFD382;width: 30%">Name</th>
            <th style="color: red;font-size: 30px;background-color: #FFD382;width: 30%">Email</th>
            <th style="color: red;font-size: 30px;background-color: #FFD382;width: 20%">Birthday</th>
            <th style="color: red;font-size: 30px;background-color: #FFD382;width: 10%">Gender</th>
            <th style="color: red;font-size: 30px;background-color: #FFD382;width: 10%">Color</th>

        </tr>
        <?php
        for($num =0;$num < $query->num_rows;$num++){
            $data=$query->fetch_row();
            $person = $data[0] ;
        ?>
            <tr>
                <!--// Name , Email , Birthday , Gender , Color -->
                <td style="font-size:25px ;background-color: white;text-align: center"><b><?php echo "<a href='personal_page.php?id=$person'>$data[0] </a>"?></b></td>
                <td style="font-size:25px;background-color: white;text-align: center"><b> <?php echo $data[3] ?></b></td>
                <td style="font-size:25px;background-color: white;text-align: center"><b> <?php echo $data[2] ?></b></td>
                <td style="font-size:25px;background-color: white;text-align: center"><b> <?php echo $data[4] ?></b></td>
                <td style="font-size:25px;background-color: white;text-align: center"><b><?php echo $data[5] ?></b></td>
            </tr>
            <?php } ?>

    </table>
</body>
</html>