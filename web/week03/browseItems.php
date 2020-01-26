<?php
session_start();

$items = array("Death Stranding", "Jedi Fallen Order", "Modern Warfare", "Medievil");
$amounts = array("49.99", "59.99", "69.99","29.99");

if(!isset($_SESSION["total"])){
    $_SESSION["total"] = 0;
    //for ($i = 0; $i < sizeof($items); $i++){

    //}
}

if(isset($_GET["reset"])){
    if($_GET["reset"] == "true"){
        unset($_SESSION["qty"]);
        unset($_SESSION["amounts"]);
        unset($_SESSION["total"]);
        unset($_SESSION["cart"]);
    }
}

if(isset($_GET["add"])){
    $i = $_GET["add"];
    $qty = $_SESSION["qty"][$i] + 1;
}
?>

<h2>List of All Products</h2>
<table>
	<tr>
		<th>Product</th>
		<th width="10px">&nbsp;</th>
		<th>Amount</th>
		<th width="10px">&nbsp;</th>
		<th>Action</th>
	</tr>
<?php
for ($i=0; $i< sizeof($items); $i++) {
?>
	<tr>
		<td><?php echo($items[$i]); ?></td>
		<td width="10px">&nbsp;</td>
		<td><?php echo($amounts[$i]); ?></td>
		<td width="10px">&nbsp;</td>
		<td><a href="?add=<?php echo($i); ?>">Add to cart</a></td>
	</tr>
<?php
}
?>
    <a colspan="5" href="ViewCart.php"><button >View Cart</button></a>
    <a href="?reset=true"><button >Reset Cart</button></a>


</table>