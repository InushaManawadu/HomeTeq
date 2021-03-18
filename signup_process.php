<?php
session_start();
include("db.php");

$pagename="Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$fname=$_POST['fname']; 
$lname=$_POST['lname'];
$address=$_POST['address'];
$postcode=$_POST['postcode'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$conpwd=$_POST['conpwd'];
		
$sqlEmail = "SELECT userEmail FROM users";
$exeEmailSQL=mysqli_query($conn,$sqlEmail) or  die (mysqli_error($conn));
$arrayp=mysqli_fetch_array($exeEmailSQL); 

			if(!empty($_POST['fname']||$_POST['lname']||$_POST['address']||$_POST['postcode']||$_POST['tel']||$_POST['email']||$_POST['conpwd'])) {
								
			/* Password Matching Validation */
				if(!($_POST['pwd']== $conpwd)){ 
				echo'<b>Passwords are not Matching</b><br>'; 
				//Display a link back to register page
				 echo "<br><a href='signup.php'>Click here to go back to Registration page</a>";
				} 
                
                else{
					//define regular expression
					//if email matches the regular expression 
					 /* Email Validation */
					$regExp="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/";
                    foreach($arrayp as $value) {
                        if($value == $email) {
                            echo "Entered email is already exists.<br>";
                            echo"<br><a href='login.php'>Click here to go to login page.</a><br>";   
                            return;
                        }                        
                    }
					if (preg_match($regExp,$email )) {
                        echo "Entered email is a valid email address<br>";
						
						$SQL="INSERT INTO users (userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword) VALUES('$fname','$lname','$address','$postcode','$tel','$email','$conpwd')";
						//run SQL query for connected DB or exit and display error message
						$exeSQL=mysqli_query($conn,$SQL) or  die (mysqli_error($conn)); 
						$errNo=mysqli_errno($conn);

                        if ($errNo==0){
						  echo "You have registered successfully!";
						  echo"<br><a href='login.php'>Click here to go to login page</a>";
						  
						}else if($errNo!=0){
							echo "Error :".mysqli_error($conn);
							if($errNo==1062){
								echo "Email address already taken";
								 echo "<br><a href='signup.php'>Click here to go back to Registration page</a>";
							}
							if($errNo==1064){
								echo "Invalid characters are userd in the email address";
								 echo "<br><a href='signup.php'>Click here to go back to Registration page</a>";
							}
					    }
					}
					else{
					  //Display "email not in the right format" message and link back to register page
					  echo "Email not in the right format";
					   echo "<br><a href='signup.php'>Click here to go back to Registration page</a>";
					}
				}
						
		    }else{
				//Display "all mandatory fields need to be filled in " message and link to register page
				echo "All mandatory fields need to be filled in ";
				echo "<br><a href='signup.php'>Click here to go back to Registration page</a>";
            }   

include("footie.html");
echo "</body>";
?>