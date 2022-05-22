<?php 

session_start();

$cart=isset($_SESSION['cart'])? $_SESSION['cart'] : array();
$wish= array();
$bag_list= array();
if(isset($_GET['cart'])){

foreach (json_decode($_GET['cart'])as $value){
    if(!isset($cart[$value])){
    $cart[$value]='1';}
        else{
            $cart[$value]+='1';
        }
}
foreach (json_decode($_GET['wish'])as $value){
    if(!isset($wish[$value])){
        $wish[$value]=$value;}
        
}
$_SESSION['wish']=$wish;
$_SESSION['cart']=$cart;
}
foreach($_SESSION['cart'] as $key=>$row){
    if($row==0){
        unset($cart[$key]);
    }
}

$numWish=count($wish);
$numCart=array_sum ($cart);
$driver = new mysqli_driver();
$driver->report_mode = (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
$mysqli = new mysqli("localhost", "root", "", "sigma_shop"); 

    if (count($cart) > 0) {
    $cart_str = implode(',', array_keys($cart));
    $query = "SELECT * FROM products WHERE id IN ($cart_str )"; 
    $result = $mysqli->query($query); 
    while ($row = $result->fetch_object()) {
        if ($row->amount > $cart[$row->id]) {
            $row->count = $cart[$row->id];
        } else {
            $row->count = $row->amount;
            $_SESSION['cart'][$row->id] = $row->amount;
        }
        $row->amount2 = number_format($row->count * $row->price, 2, '.');
        
        $bag_list[] = $row;
    }

}
}
catch(mysqli_sql_exception  $e)
{
print_r("something wrong");
die();
}

require_once('my_bag.html');

?>