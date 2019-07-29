<?php session_start() ;
    $page_owner = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <title> Personal Page</title>
</head>

<body style="background-image: url(background_1.jpg);">
    <?php
        // Check privilege
        if ($_SESSION['Username']){
            echo "<h1 style='color: #EF3B3A'>Welcome:</h1>"."<h1 style='color: white;'>".$_SESSION['Username']."</h1>" ; ?>
            <h3 style="color: yellow">See others page? Press Previous</h3><input type="button" value="Previous" onclick="location.href='http://localhost:8888/form_exercise.php'">
            <hr>

            <?php
                // Get connection
                $server ="localhost";
                $username ="tzching";
                $password ="00000000";
                $db_name ="RegistrationForm";

               // Connect to server(database) -> Check success or not
                $con = new mysqli($server,$username,$password,$db_name);
                if ($con->connect_error){
                    die("Connect fault: ". $con->connect_errno);
                }

                $sql = "Select * from MemberAccount Where Username='$page_owner'";
                $query = $con->query($sql);
                $row = $query->fetch_assoc();

            ?>
            <table style="border:3px #FFD382 dashed;" cellpadding="20" border='1'>
                <tr>
                    <th style="color: red;font-size: 30px;background-color: #FFD382;width: 30%">Name</th>
                    <th style="color: red;font-size: 30px;background-color: #FFD382;width: 30%">Email</th>
                    <th style="color: red;font-size: 30px;background-color: #FFD382;width: 20%">Birthday</th>
                    <th style="color: red;font-size: 30px;background-color: #FFD382;width: 10%">Gender</th>
                    <th style="color: red;font-size: 30px;background-color: #FFD382;width: 10%">Color</th>

                </tr>
                <tr>
                    <!--// Name , Email , Birthday , Gender , Color -->
                    <td style="font-size:25px ;background-color: white;text-align: center"><b><?php echo $row['Username']?></b></td>
                    <td style="font-size:25px;background-color: white;text-align: center"><b> <?php echo $row['Email'] ?></b></td>
                    <td style="font-size:25px;background-color: white;text-align: center"><b> <?php echo $row['Birthday'] ?></b></td>
                    <td style="font-size:25px;background-color: white;text-align: center"><b> <?php echo $row['Gender'] ?></b></td>
                    <td style="font-size:25px;background-color: white;text-align: center"><b><?php echo $row['Color'] ?></b></td>
                </tr>
            </table>
            <hr>
            <?php
        }else{
            echo '<h1 style="color: #EF3B3A; background-color: #8DC26F">YOU DO NOT HAVE PRIVILEGE TO LOAD !<br></h1>' ;
            echo '<h1 style="color: #EF3B3A;background-color: #8DC26F">Please <a href="login_page.php"><ins>Login</ins></a> to get privilege </h1>';
        }
    ?>

</body>
</html>

