<?php
  include "cart.php";
  session_start();
  $cart =& $_SESSION['wfcart'];
  if(!is_object($cart)){
    $cart = new wfCart();
  } 
?>
<html><head><title>Demo</title></head>
<body><h1>Demo</h1>

<?php
$products = array();
$products[1] = array("id"=>1,"name"=>"A","price"=>2.00);
$products[2] = array("id"=>2,"name"=>"B","price"=>4.80);
$products[3] = array("id"=>3,"name"=>"C","price"=>12.95);
// check to see if any items are being added

if(!empty($_POST['add'])) {
	$product = $products[$_POST['id']];
	@$cart->add_item($product['id'],$_POST['qty'],$product['price'],$product['name']);
}
if(!empty($_POST['remove'])) {
	$rid = intval($_POST['id']);
	$cart->del_item($rid);
}


echo "<table border='1'>";
foreach($products as $p) {
	echo "<tr><td><form method='post' action='demo.php'>";
	echo "<input type='hidden' name='id' value='".$p['id']."'/>";
	echo "".$p['name'].' $'.number_format($p['price'],2)." ";
	echo "<input type='text' name='qty' size='5' value='1'><input type='submit' value='Add to cart' name='add'>";
	echo "</form></td></tr>";
}
echo "</table>";
echo "<h2>Items in cart</h2>";
if($cart->itemcount > 0) {
	foreach($cart->get_contents() as $item) {
		echo "<br />Item:<br/>";
		echo "Code/ID :".$item['id']."<br/>";
		echo "Quantity:".$item['qty']."<br/>";
		echo "Price   :$".number_format($item['price'],2)."<br/>";
		echo "Info    :".$item['info']."<br />";
		echo "Subtotal :$".number_format($item['subtotal'],2)."<br />";
		echo "<form method=post><input type='hidden' name='id' value='".$item['id']."'/><input type='submit' name='remove' value='Remove'/></form>";
	}
	echo "---------------------<br>";
	echo "total: $".number_format($cart->total,2);
} else {
	echo "No items in cart";
}
?>
