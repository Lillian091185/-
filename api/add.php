<?php
include_once "../base.php";

//將帳號字母轉變為小寫
$_POST['acc']=strtolower($_POST['acc']);

save("account_info",$_POST);

 ?>