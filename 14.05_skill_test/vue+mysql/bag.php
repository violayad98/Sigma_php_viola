<?php 
class Product
{
    public $wishClass,$cartClass;
    public function __construct($info)
    {
        foreach ($info as $key => $value) {
            $this->$key = $value;
        }
         
    }
}
session_start();
$driver = new mysqli_driver();
$driver->report_mode = (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try
{
$mysqli = new mysqli("localhost", "root", "", "sigma_shop"); 
$query = "SELECT * FROM products"; 
 $wish_list=array();
$result = $mysqli->query($query); 

while ($row = $result->fetch_object()) {
       $product= new Product($row);
     
     if(isset($_SESSION['wish'][$row->id])){
         $wish_list[$row->id]=$row->id;
        $product->wishClass='btn-success';
    } else{
        $product->wishClass='btn-primary';
        
        
    }
    if(isset($_SESSION['cart'][$row->id])){
        $product->amount-=$_SESSION['cart'][$row->id];
        $product->cartClass='btn-warning';
    } else{
        $product->cartClass='btn-primary';
    
    }
    if($product->amount==0){
         $product->cartClass='btn-secondary';}
         $products[]=$product;
    
}$numWish=count($wish_list);
} 

catch(mysqli_sql_exception  $e)
{
print_r("something wrong");
  die();

}

require_once('bag.html');
?>