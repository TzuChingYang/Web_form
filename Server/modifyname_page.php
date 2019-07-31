<?php session_start();
    $person=$_SESSION['person'];
    $sql_old=$_POST['oldname'];
    $sql_new=$_POST['modifyname'] ;

    $rename_old='upload/'.$sql_old;

    ?>

<?php
    //Connect to Database setting
    $server = "localhost";
    $username = "tzching";
    $password = "00000000";
    $db_name = "RegistrationForm";

    $con =new mysqli($server,$username,$password,$db_name);

    // Get file's data first
    $sql = "Select * from FileData where Filename='$sql_old'";
    $query = $con->query($sql);
    $row = $query->fetch_assoc();

    $rename_new='upload/'.$sql_new;

    if (rename($rename_old,$rename_new)){
        echo 'Success <br>' ;
    }else{
        echo 'Fail <br>' ;
    }

    $sql = "Update FileData Set Filename='$sql_new' where Filename='$sql_old'";
    $query = $con->query($sql);

    if($query === true){
        echo 'File Name Update Success.'.'<br>';
        echo 'Return in 3 seconds...';

        echo "<meta http-equiv=REFRESH CONTENT=3;url=personal_page.php?id=$person>";
    }else{
        echo "Error updating record: " . $con->error.'<br>';
        echo "<meta http-equiv=REFRESH CONTENT=3;url=personal_page.php?id=$person>";

    }

?>
