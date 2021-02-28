<?php
session_start();
include("db.php");

$pagename="Sign Up Results"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<body>";
include ("headfile.html");
echo "<h4>".$pagename."</h4>";

$fname=$_POST['fname']; 
$lname=$_POST['lname'];
$address=$_POST['address'];
$postcode=$_POST['postcode'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$conpwd=$_POST['conpwd'];

if(!empty($_POST['fname'] || $_POST['lname'] || $_POST['address'] || $_POST['postcode'] || $_POST['tel'] || $_POST['email'] || $_POST['conpwd'])) {
    if(!($_POST['pwd'] == $conpwd)) {
        echo "Passwords are not Matching..<br>";
        echo "<a href='signup.php'> Click Here to Register Again</a>";
    }
    else {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        if (preg_match($regExp,$email )) {
            echo "Entered email is a valid email address<br>";
            $SQL="INSERT INTO Users (userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword) VALUES('$fname','$lname','$address','$postcode','$tel','$email','$conpwd')";
            $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
            $errNo=mysqli_errno($conn);
    }
}



include("footie.html");
echo "</body>";
?>