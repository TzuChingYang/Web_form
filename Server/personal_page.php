<?php session_start() ;
    $page_owner = $_GET['id'];
    $_SESSION['person']=$page_owner;
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

            <h1 style="color: white">Upload your file</h1>
                <?php // You need privilege to do operation
                if ($_SESSION['Username'] == $page_owner) {


                    ?>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <h2 style="color: white">file name: <input type="file" name="file"></h2>
                        <input type="submit" value="UPLOAD">
                    </form>
                    <hr>
                    <h1 style="color: white">File list <ins>(Click on file's name to Download)</ins> <br></h1>

                    <!-- Catch File from FileData and list the file information -->
                        <table style="border:3px #FFD382 dashed;" cellpadding="20" border='1'>
                            <tr>
                                <th style="color: red;font-size: 30px;background-color: #FFD382;width: 20%">Filename</th>
                                <th style="color: red;font-size: 30px;background-color: #FFD382;width: 20%">Filetype</th>
                                <th style="color: red;font-size: 30px;background-color: #FFD382;width: 20%">Filesize</th>
                                <th style="color: red;font-size: 30px;background-color: #FFD382;width: 20%">Filetime</th>
                                <th style="color: red;font-size: 30px;background-color: #FFD382;width: 20%">Modify Name</th>

                            </tr>

                    <?php
                    $sql="Select * from FileData where Belongs='$page_owner'";
                    $query = $con->query($sql);

                    for ($num =0;$num<$query->num_rows;$num ++) {
                        $data = $query->fetch_assoc();
                        $filename = $data['Filename'];
                        $filesize = $data['Filesize'];
                        ?>
                            <tr>
                                <!--// Name , Email , Birthday , Gender , Color -->
                                <td style="font-size:25px ;background-color: white;text-align: center"><b><?php echo "<a href='upload/$filename' download> $filename </a>" ?></b></td>
                                <td style="font-size:25px;background-color: white;text-align: center"><b> <?php echo $data['Filetype'] ?></b></td>
                                <td style="font-size:25px;background-color: white;text-align: center"><b> <?php echo round($filesize,2) .' KB' ?></b></td>
                                <td style="font-size:25px;background-color: white;text-align: center"><b> <?php echo $data['Filetime'] ?></b></td>
                                <td style="font-size:25px;background-color: white;text-align: center">
                                    <form action='modifyname_page.php' target='_self' method='post'>
                                        <input type="text" name="modifyname">
                                        <?php echo "<input hidden type='text' name='oldname' value=$filename>"?>
                                        <input type="submit" value="modify">
                                    </form>
                                </td>

                            </tr>
                        <?php
                    }
                    ?>
                    </table>

                    <?php
                }else{
                    echo '<h1 style="color: red;background-color: greenyellow">You dont have privilege <br>' ;
                }
                    ?>


            <?php
        }else{
            echo '<h1 style="color: #EF3B3A; background-color: #8DC26F">YOU DO NOT HAVE PRIVILEGE TO LOAD !<br></h1>' ;
            echo '<h1 style="color: #EF3B3A;background-color: #8DC26F">Please <a href="login_page.php"><ins>Login</ins></a> to get privilege </h1>';
        }
    ?>

</body>
</html>

