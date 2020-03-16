<?php
    
    include_once "../base.php";

    //批次刪除
    foreach($_POST['id'] as $id){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            del("account_info",$id);
        }
    }

    to("../index.php");
?>