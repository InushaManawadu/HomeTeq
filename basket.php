<?php
session_start();

include("db.php");
$pagename="Smart Basket"; 
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; 
echo "<title>".$pagename."</title>";

echo "<body>";
include ("headfile.html");
include('detectlogin.php');
echo "<h4>".$pagename."</h4>";


if(isset($_POST['hiddenId'])) {
    $delprodid = $_POST['hiddenId'];
    unset($_SESSION['basket'][$delprodid]); 
    echo "1 item removed<br>";
}

//if the posted ID of the new product is set i.e. if the user is adding a new product into the basket
//capture the ID of selected product using the POST method and the $_POST superglobal variable
//and store it in a new local variable called $newprodid
//capture the required quantity of selected product using the POST method and $_POST superglobal variable
//and store it in a new local variable called $reququantity
if(isset($_POST['h_prodid'])) {
    $newprodid = $_POST['h_prodid'];
    $reququantity = $_POST['p_quantity'];
    //create a new cell in the basket session array. Index this cell with the new product id.
    //Inside the cell store the required product quantity 
    $_SESSION['basket'][$newprodid] = $reququantity;
    echo "<p><b>1 item added to the basket. </b></p></br>";
}
else {
    echo "<p1><b>Basket Unchanged";
}

echo "<table>";
echo "<th> Product Name </th>";
echo "<th> Price </th>";
echo "<th> Quantity </th>";
echo "<th> Subtotal </th>"; 
echo "<th> Remove Product </th>"; 

//if the session array $_SESSION['basket'] is set
if(isset($_SESSION['basket'])) {
    $total = 0;
    //loop through the basket session array for each data item inside the session using a foreach loop
    //to split the session array between the index and the content of the cell
    //for each iteration of the loop
    //store the id in a local variable $index & store the required quantity into a local variable $value
    echo "<form action=basket.php method=post>";
    foreach($_SESSION['basket'] as $index => $value) {
        
        $SQL="select prodId, prodName, prodPrice from product where prodId = ".$index;
        $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn)); 
        $arrayp=mysqli_fetch_array($exeSQL);

        echo "<tr>";
        echo "<td>".$arrayp['prodName']."</td>";
        echo "<td>$".$arrayp['prodPrice']."</td>";
        echo "<td>".$value."</td>";
        $subtotal = $arrayp['prodPrice']*$value;
        echo "<td>$".$subtotal."</td>";
        echo "<td><input type='submit' value= 'Remove'></td>";
        echo "<input type=hidden name=hiddenId value=".$index.">";
        echo "</tr>";
        $total += $subtotal;
        
    }
    echo "<tr>";
    echo "<tr><td colspan = '4' style = 'text-align:right'><b>Total</b></td>";
    echo "<td><b>$" .$total. "</b></td>";
    echo "</tr>";
    echo "</form>";
}
else{
	echo "<br>Empty Basket";
	echo "<tr><td colspan = '4' style = 'text-align:right'><b>Total</b></td>";
    echo "<td><b>$0.00</b></td></tr>";
}
echo "</table></br>";
echo "<a href='clearbasket.php'>CLEAR BASKET</a><br>";
echo "<br>";

if(isset($_SESSION['userid'])) {
    echo"To Finalise Your Order: <a href='checkout.php'> Checkout </a>";
}
else {
    echo "<p>New HomeTeq Customers: <a href='signup.php'>Sign Up</a><br>";
    echo "<br>";
    echo "<p>Returning HomeTeq Customers: <a href='login.php'>Log In</a><br>";
}
  
include("footie.html");
echo "</body>";
?>