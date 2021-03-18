<?php
    session_start();
    
    include("db.php");
    $pagename="A smart buy for a smart home"; 
    echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
    echo "<title>".$pagename."</title>";
    echo "<body>";
    include ("headfile.html");
    include('detectlogin.php');
    echo "<h4>".$pagename."</h4>";

    /*retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
    applied to the query string u_prod_id
    store the value in a local variable called $prodid */
    $prodid=$_GET['u_prod_id'];
    echo "<p>Selected product Id: ".$prodid;

    $SQL="select prodId, prodName, prodPicNameLarge, prodDescripLong, prodDescripLong, prodPrice, prodQuantity from product WHERE prodId =" .$prodid;
    $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
    
    echo "<table style='border: 0px'>";
    while ($arrayp=mysqli_fetch_array($exeSQL)){
        echo "<tr>";
            echo "<td style='border: 0px'>";
            echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
                echo "<img src=images/".$arrayp['prodPicNameLarge']." height=200 width=200>";
            echo "</td>";
            echo "<td style='border: 0px'>";
                echo "<p><h5>".$arrayp['prodName']."</h5>"; 
                echo "<p>".$arrayp['prodDescripLong']."</p>"; 
                echo "<h5>"."$".$arrayp['prodPrice']."</h5>"; 
                echo "<p>" ."Left in Stock: ".$arrayp['prodQuantity']."</p>"; 
                
            echo "<p>Number to be purchased: <br>";
            echo "<br>";
            //create form made of one text field and one button for user to enter quantity
            //the value entered in the form will be posted to the basket.php to be processed
            echo "<form action=basket.php method=post>";    
            echo "<select name='p_quantity'>";
                for($i=1; $i<=$arrayp['prodQuantity']; $i++){
                    echo "<option value=".$i.">".$i."</option>"; 
            }
            echo "</select>";

            echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
            //pass the product id to the next page basket.php as a hidden value
            echo "<input type=hidden name=h_prodid value=".$prodid.">";
            echo "</form>";
    
            echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

    include("footie.html");
    echo "</body>";
?>