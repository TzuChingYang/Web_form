<?php
    session_start();
    $person = $_SESSION['person'];
?>


<?php

    if($_FILES['file']['error']>0){
        echo 'File error'.$_FILES['file']['error'].'<br>';
    }else{
        echo 'File data: <br>' ;

        echo 'File name:'.$_FILES["file"]["name"].'<br>';
        echo 'File type:'.$_FILES["file"]["type"].'<br>';
        echo 'File size:'.($_FILES["file"]["size"]/1024).' KB<br><br>';

        $Filename =$_FILES["file"]["name"];
        $Filetype=$_FILES["file"]['type'];
        $Filesize=($_FILES["file"]["size"]/1024);

        if(file_exists("upload/" . $_FILES["file"]["name"])){
            echo 'File Exist ! Dont upload the same file' ;
        }else{
            echo 'File UPLOAD SUCCESS !' ;
            move_uploaded_file($_FILES["file"]["tmp_name"],"upload/".$_FILES["file"]["name"]);

            // Connect DB to create data information
            // Get connection
            $server = "localhost";
            $username = "tzching";
            $password = "00000000";
            $db_name = "RegistrationForm";

            // Connect to server(database) -> Check success or not
            $con = new mysqli($server, $username, $password, $db_name);
            if ($con->connect_error) {
                die("Connect fault: " . $con->connect_errno);
            }

            $sql = "Insert into FileData(Filename,Filetype,Filesize,Belongs) values('$Filename','$Filetype','$Filesize','$person') ";

            if($con->query($sql)==true){
                echo "<h1 >File's Data create success.</h1>";
                echo "<h3 style=\"color:black\">Back to Person page? Press Previous</h3><input type=\"button\" value=\"Previous\" onclick=\"location.href='http://localhost:8888/personal_page.php?id=$person'\">
";
            }else{
                echo "<h1>Fail ! </h1>" ;
                echo "<h2>Please try again.</h2>";
                echo "<h3 style=\"color:black\">Back to Person page? Press Previous</h3><input type=\"button\" value=\"Previous\" onclick=\"location.href='http://localhost:8888/personal_page.php?id=$person'\">
";
            }
            $connect->close();

        }
    }
    ?>
