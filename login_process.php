<?php
session_start(); 
include("db.php");
$pagename="Your Login Results"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>"; 
echo "<body>";
include ("headfile.html"); 
echo "<h4>".$pagename."</h4>"; 

$email = $_POST['mail'];
$password = $_POST['psw'];

if (!empty($email&&$password)){
	
    $SQL="select * from Users where userEmail='".$email."'"; 
    $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
    $arrayu=mysqli_fetch_array($exeSQL);

	if (!($arrayu['userEmail']==$email)){
		echo "Email not recognised, login again";
		echo "<br>Go back to : <a href='login.php'>Log In</a>";
	}
	else {
		if (!($arrayu['userPassword']==$password)){
			echo "Password not recognised, login again";
			echo "<br>Go back to : <a href='login.php'>Log In</a>";
		}
		else{
			echo "Logged in successfully !!<br>";
			$_SESSION['userid']=$arrayu['userId'];
			$_SESSION['usertype']=$arrayu['userType'];
			$_SESSION['fname']=$arrayu['userFName'];
			$_SESSION['sname']=$arrayu['userSName'];
			echo "Hello,".$_SESSION['fname']." ".$_SESSION['sname'];
			// if($arrayu['userType']=='A'){
			// 	$_SESSION['usertype']='Administrator';
			// 	echo "<br>You have successfully logged in as a homteq Administrator !";
			// 	echo "<br>Continue shopping for : <a href='index.php'>Home Tech</a>";
			// }
			
			//if($arrayu['userType']=='C'){
				$_SESSION['usertype']='Customer';
				echo "<br>You have successfully logged in as a homteq Customer !";

                echo "<br>";
                echo "<br>";
				echo "<br>Continue shopping for : <a href='index.php'>Home Tech</a>";
			    echo "<br>View your : <a href='basket.php'>Smart Basket</a>";
			//}
		}
	}
}
else {
	echo "Both email and password fields need to be filled in<br>";
	echo "<br>Go back to : <a href='login.php'>Log In</a>";
}

/* echo "Entered Email : ".$email."<br>";
echo "Entered Password : ".$password; */

include("footie.html"); //include head layout
echo "</body>";
?>