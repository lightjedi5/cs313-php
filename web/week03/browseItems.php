<!--<link rel="stylesheet" href="style.css">-->
<?php //database stuff
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}
?>
<?php //webpage stuff
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
    $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
    $_SESSION["cart"][$i] = $i;
    $_SESSION["qty"][$i] = $qty;
}

if(isset($_GET["delete"])){
    $i = $_GET["delete"];
    $qty = $_SESSION["qty"][$i];
    $qty--;
    $_SESSION["qty"][$i] = $qty;

    if($qty == 0){
        $_SESSION["amounts"][$i] = 0;
        unset($_SESSION["cart"][$i]);
    } else {
        $_SESSION["amounts"][$i] = $amounts[$i] * $qty;
    }
}

//adds the image
function _addImage($name){
    switch($name){
    case "Death Stranding":
        echo "<img class='game' src='death_stranding.jpg' alt='deathStranding'>";
        break;
    case "Jedi Fallen Order":
        echo "<img class='game' src='Jedi_Fallen_Order.jpg' alt='jediFallenOrder'>";
        break;
    case "Modern Warfare":
        echo "<img class='game' src='Modern_Warfare.jpg' alt='modernWarfare'>";
        break;
    case "Medievil":
        echo "<img class='game' src='medievil.jpg' alt='medievil'>";
        break;
    }
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
		<td><?php _addImage($items[$i]); ?></td>
		<td width="10px">&nbsp;</td>
		<td><?php echo($amounts[$i]); ?></td>
		<td width="10px">&nbsp;</td>
		<td><a href="?add=<?php echo($i); ?>">Add to cart</a></td>
	</tr>
<?php
}
?>
    <a colspan="5" href="shopping_cart.php"><button >View Cart</button></a>
    <a href="?reset=true"><button >Reset Cart</button></a>


</table>