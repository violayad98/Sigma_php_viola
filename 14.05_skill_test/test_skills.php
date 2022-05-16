 <?php

 class Things
{
}

function diff($object, $sum)
{
    $all = 0;
    foreach ($object as $value) {
        $all += $value;
    }
    return $all - $sum;
}

$obj = new Things();
$obj->skate = 200;
$obj->painting = 200;
$obj->shoes = 100;

$diff = diff($obj, 400);
echo $diff;

?> 
