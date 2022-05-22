<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$wish = array();
$wish_list = array();
if (isset($_GET['cart'])) {
    foreach (json_decode($_GET['cart']) as $value) {
        if (! isset($cart[$value])) {
            $cart[$value] = '1';
        } else {
            $cart[$value] += '1';
        }
    }
    foreach (json_decode($_GET['wish']) as $value) {
        if (! isset($wish[$value])) {
            $wish[$value] = $value;
        }
    }
    $_SESSION['wish'] = $wish;
    $_SESSION['cart'] = $cart;
}
$numWish = count($wish);
$numCart = array_sum($cart);
$driver = new mysqli_driver();
$driver->report_mode = (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try{
$mysqli = new mysqli("localhost", "root", "", "sigma_shop");
if (count($wish) > 0) {
    $wish_str = implode(',', $wish);
    $query = "SELECT * FROM products WHERE id IN ($wish_str )"; // готовим запрос. будем выбирать все из //таблицы workers
    $result = $mysqli->query($query); // выполняем запрос query.
    while ($row = $result->fetch_object()) {
        $wish_list[] = $row;
    }
}
if (count($cart) > 0) {
    $cart_str = implode(',', array_keys($cart));
    $query = "SELECT * FROM products WHERE id IN ($cart_str )"; // готовим запрос. будем выбирать все из //таблицы workers
    $result = $mysqli->query($query); // выполняем запрос query.
    while ($row = $result->fetch_object()) {
        if ($row->amount < $cart[$row->id]) {
            $_SESSION['cart'][$row->id] = $row->amount;
        }
        
        $bag_list[] = $row;
    }
}
}
catch(mysqli_sql_exception  $e)
{
    print_r("something wrong");
    die();
}
// }
require_once ('wish.html');

?>