<?php session_start();
    $oldname = 'upload/'.$_POST['oldname'];
    $modifyname='upload/'.$_POST['modifyname'].'.png';
?>

<?php
    //Connect to Database setting
    $server = "localhost";
    $username = "tzching";
    $password = "00000000";
    $db_name = "RegistrationForm";

    $con =new mysqli($server,$username,$password,$db_name);
    echo 'Old file name: '.$oldname.'<br>';
    echo 'New file name: '.$modifyname.'<br><br>';

    if (rename($oldname,$modifyname)){
        echo 'Change success !';
    }else{
        echo  'Failure';
    }

?>

