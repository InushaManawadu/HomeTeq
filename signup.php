<?php
$pagename="Sign Up";
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");
echo "<h4>".$pagename."</h4>";

echo "<form action= signup_process.php method=post>";  
    echo "<table style='border:0px; margin-top:-20px; margin-left:35%; box-shadow: 5px 5px;'>";

        echo "<tr>";
        echo "<td style='border:0px'>";
        echo "First Name";
        echo "</td>";
        echo "<td  style='border:0px'>"; 
		echo "<input type='text'  name='fname'>";
		echo"</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='border:0px'>";
        echo "Last Name";
        echo "</td>";
        echo "<td  style='border:0px'>"; 
		echo "<input type='text'  name='lname'>";
	    echo"</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='border:0px'>";
        echo "Address";
        echo "</td>";
        echo "<td  style='border:0px'>"; 
		echo "<input type='text'  name='address'>";
		echo"</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td style='border:0px'>";
        echo "Postcode";
        echo "</td>";
        echo "<td  style='border:0px'>"; 
		echo "<input type='text'  name='postcode'>";
		echo"</td>";
        echo "</tr>";

        echo "<tr>"; 
		echo "<td  style='border:0px'>"; 
		echo "Tel NO:";
	    echo"</td>";
		echo "<td  style='border:0px'>"; 
		echo "<input type='text'  name='tel'>";
		echo"</td>";
		echo "</tr>";

        echo "<tr>"; 
		echo "<td  style='border:0px'>"; 
		echo "Email Address";
		echo"</td>";
		echo "<td  style='border:0px'>"; 
		echo "<input type='email'  name='email'>";
		echo"</td>";
		echo "</tr>";

        echo "<tr>"; 
		echo "<td  style='border:0px'>"; 
		echo "Password";
		echo"</td>";
		echo "<td  style='border:0px'>"; 
		echo "<input type='password'  name='pwd'>";
		echo"</td>";
		echo "</tr>";

        echo "<tr>"; 
		echo "<td  style='border:0px'>";
	    echo "Confirm password";
		echo"</td>";
		echo "<td  style='border:0px'>"; 
		echo "<input type='password'  name='conpwd'>";
		echo"</td>";
		echo "</tr>";

        echo "<tr>"; 
		echo "<td  style='border:0px'>";
		echo "<input style='border-radius:10px; background-color:gray; color: white;' type=submit value='Sign up'>";
		echo"</td>";
	    echo "<td  style='border:0px; text-align:right;'>";
		echo "<input style='border-radius:10px; background-color:gray; color: white;' type=submit value='Clear Form'>";
		echo"</td>";
		echo "</tr>";

    echo "</table>";
echo "</form>";

include("footie.html");
echo "</body>";
?>