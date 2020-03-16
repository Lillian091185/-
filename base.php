<?php
    //建立PDO
    $dsn="mysql:host=localhost;charset=utf8;dbname=account";
    $pdo=new PDO($dsn,"root","");

    //取得單筆資料
    function find($table,...$arg){
        //宣告全域變數pdo
        global $pdo;

        //下查詢語法
        $sql="select * from $table where ";

        //判斷arg的第一個值是否為陣列
        if(is_array($arg[0])){

            //用foreach帶key值輸出陣列
            foreach($arg[0] as $k => $v){

                //將key值以`字串`與 value值以'字串'格式化後寫入tmp陣列中，使之符合資料庫語法的格式
                $tmp[]=sprintf("`%s`='%s'",$k,$v);
            }

            //用&&將tmp陣列轉換為字串並接續在sql之後
            $sql=$sql.implode(" && ",$tmp);
        }else{
            $sql=$sql."`id`='".$arg[0]."'";
        }
        
        //取得一列結果列，並返回以欄位名稱作為索引鍵(key)的陣列(array)
        return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    //取得全部資料
    function all($table,...$arg){
        global $pdo;
        $sql="select * from $table ";
        if(!empty($arg[0])){
            foreach($arg[0] as $k => $v){
                $tmp[]=sprintf("`%s`='%s'",$k,$v);
            }
            $sql=$sql." where ".implode(" && ",$tmp);
        }
        if(!empty($arg[1])){
            $sql=$sql.$arg[1];
        }
        return $pdo->query($sql)->fetchAll();
    }

    //計算資料筆數
    function nums($table,...$arg){
        global $pdo;
        $sql="select count(*) from $table ";
        if(!empty($arg[0])){
            foreach($arg[0] as $k => $v){
                $tmp[]=sprintf("`%s`='%s'",$k,$v);
            }
            $sql=$sql." where ".implode(" && ",$tmp);
        }
        if(!empty($arg[1])){
            $sql=$sql.$arg[1];
        }
        return $pdo->query($sql)->fetchColumn();
    }

    //刪除資料
    function del($table,...$arg){
        global $pdo;
        $sql="delete from $table where ";
        if(is_array($arg[0])){
            foreach($arg[0] as $k => $v){
                $tmp[]=sprintf("`%s`='%s'",$k,$v);
            }
            $sql=$sql.implode(" && ",$tmp);
        }else{
            $sql=$sql."`id`='".$arg[0]."'";
        }
        return $pdo->exec($sql);
    }

    //新增/編輯單筆資料
    function save($table,$data){
        global $pdo;
        if(!empty($data['id'])){
            foreach($data as $k => $v){
                if($k!='id'){
                    $tmp[]=sprintf("`%s`='%s'",$k,$v);
                }
            }
            $sql="update $table set ".implode(",",$tmp)." where `id`='".$data['id']."'";
        }else{
            $sql="insert into $table (`".implode("`,`",array_keys($data))."`) value ('".implode("','",$data)."')";
        }
        return $pdo->exec($sql);
    }

    //查詢資料
    function q($sql){
        global $pdo;
        return $pdo->query($sql)->fetchAll();
    }

    //頁面導向
    function to($path){
        header("location:".$path);
    }
    
    
?>