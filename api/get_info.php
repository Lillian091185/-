<?php

include_once "../base.php";

$id=$_GET['edit_id'];

$info=find("account_info",$id);

//轉成json格式
echo json_encode($info);

?>
