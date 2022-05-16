 <?php

 function sum($array)
 {
     $discount=array();
     $sum=0;
 
     foreach($array as $value){
        if(substr($value,-3)==".99") {
            $discount[]=$value;
     }else{
         $sum+=$value;
     }
 }
 rsort($discount);
 if(count($discount)>=3){
     $sum+=$discount['0'];
 }else{
     foreach($discount as $value){
         $sum+=$value;
     }
 }
 return  $sum;
 
 }
 
 
 
 
 $sum = sum(array(10.99,11.99,12.99,13.00));
 
 echo $sum;
 

?> 
