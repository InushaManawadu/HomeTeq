<?php
session_start();
$pagename="Login"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
echo "<title>".$pagename."</title>";
echo "<body>";
include ("headfile.html");
echo "<h4>".$pagename."</h4>";

echo "<form action=login_process.php method=post>";
    echo "<table style='border:0px'>";

        echo "<tr>";
        echo "<td td style='border: 0px'>* Email: </td>";
        echo "<td style='border: 0px'> <input type='text' name='mail'> </td></tr>";
        echo "</tr>";

        echo "<tr>";
        echo "<td td style='border: 0px'>* Password: </td>";
        echo "<td style='border: 0px'> <input type='password' name='psw'> </td></tr>";
        echo "</tr>";

        echo "<tr>";
        echo "<td td style='border: 0px'> <input style='border-radius:10px; background-color:gray; color: white;' type='submit' value= 'Log In'> </td>";
        echo "<td style='border: 0px'> <input style='border-radius:10px; background-color:gray; color: white;' type='submit' value= 'Clear Form'> </td></tr>";
        echo "</tr>";

    echo "</table>";
echo "</form>";

include("footie.html");
echo "</body>";
?>