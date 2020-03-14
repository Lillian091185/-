<?php
    include_once "../base.php";

    $id=$_POST['edit_id'];

    $data=find("account",$id);

    foreach($_POST as $k => $v){
        switch($key){
            case "id":
            case "year":
            case "month":
            case "day":
            break;
            default:
                $data[$k]=$v;
        } 
    }
    $data['birthday']=$_POST["year"]."-".$_POST['month']."-".$_POST['day'];
    
    save("account",$data);

?>