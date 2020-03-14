<?php

include_once "base.php";

$id=$_GET['id'];

$info=find("account",$id);


//轉成json格式
echo json_encode($info);


?>
