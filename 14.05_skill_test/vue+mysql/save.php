<?php 
session_start();
$cart=isset($_SESSION['cart'])? $_SESSION['cart'] : array();
$wish= array();
$bag_list= array();


 foreach (json_decode($_GET['cart'])as $row){
        $cart[$row->id]=$row->count;
}

$_SESSION['cart']=$cart;
 
header('Location:/vue+mysql/my_bag.php');
?>