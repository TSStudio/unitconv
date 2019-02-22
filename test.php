<?php
include "./unitconv.php";
$value1=$_GET["v1"];
$unit1=$_GET["u1"];
$unit2=$_GET["u2"];
$type=$_GET["t"];
$converter=new unitconv();
$value2=$converter->convert($value1,$unit1,$unit2,$type);
if(!$value2){
    echo $converter->errormsg;
    die();
}
echo $value2;