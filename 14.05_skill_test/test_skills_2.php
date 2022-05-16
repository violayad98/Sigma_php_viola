 <?php

 $size=$_POST['size'];
 sort($size);
 $door=$_POST['door'];
 sort($door);

 if($door['0']>=$size['0'] and $door['1']>=$size['1']){
     echo "Замовляйте сміливо";
 }else{
     echo "Доведеться стіну зносити";
 }

?> 
