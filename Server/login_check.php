<!--/* ======================================*/
// This page is main to check login success or fail
// If Login is successful it will show message of success login
// and put privilege in $_session['username] to check your identity -> Return to Member page

// Or it will return a failure message and
// and then return you to login page again !

/* ======================================*/ -->
<?php
    session_start() ;
?>

<!-- Connect to database first -->
<?php
//Basic setting
$host="localhost" ;
$db_username="tzching";
$db_password="00000000";
$db_name="RegistrationForm";

$id = $_POST['username'];
$pw = $_POST['password'];

//Construct connection
$conn = new mysqli($host,$db_username,$db_password,$db_name);
// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    echo "Finish Loading your information <br><br>";
}

$sql = "Select * from MemberAccount where Username='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();

    if($id != null && $pw != null && $row['Username'] == $id && $row['Password'] == $pw) {

        //將帳號寫入session，方便驗證使用者身份

        $_SESSION['Username'] = $id;
        $test = $_SESSION['Username'] ;
        echo 'Login success! <br>';
        echo 'Welcome: '.$id.'   !!!!!<br>' ;
        echo 'Now $_SESSION[\'Username\']= '.$test.'<br>';
        echo 'Page will return to Registration after 5 second...<br>';

        echo '<meta http-equiv=REFRESH CONTENT=5;url=form_exercise.php>';

    } else {

        echo 'Login failure ! <br>';
        echo 'Please try again !<br>' ;
        echo 'Page will return to Login page after 5 second...<br>';


        echo '<meta http-equiv=REFRESH CONTENT=5;url=login_page.php>';

    }

} else {
    echo 'Login failure ! <br>';
    echo 'Please try again !<br>' ;
    echo 'Page will return to Login page after 5 second...<br>';


    echo '<meta http-equiv=REFRESH CONTENT=5;url=login_page.php>';

}
$conn->close();
?>
