<?php
include_once "../base.php";

foreach($_POST as $key => $value){
    switch($key){
        case "year":
        case "month":
        case "day":
        break;
        default:
            $data[$key]=$value;
    } 
 }
    $data['birthday']=$_POST["year"]."-".$_POST['month']."-".$_POST['day'];

 save("account",$data);

 ?>