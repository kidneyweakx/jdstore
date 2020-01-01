<?php
    // connect mysql
    $pdo = new PDO("mysql:host=localhost;dbname=fp;charset=utf8", "root", "");
    session_start();

    // footer text
    $footer = "2019-2020 &emsp;<a href='https://github.com/kidneyweakx'>kidneyweakx</a>";

    // useful function
    function All($sql) {
	global $pdo;
	return $pdo-> query($sql)-> fetchAll();
    }

    function lo($l) {
        return header("location:".$l);
    }

    function isc1($c) {
        global $link;
        $cc = All("select tree from category where id = '".$c."'")[0][0];
        if($cc == 0)	return true;
        else return false;
    }

    // 產生驗證碼
    function getnums() {
        $n1 = rand(10, 99);
        $n2 = rand(10, 99);
        $n3 = $n1 + $n2;
        $r = array($n1, $n2, $n3);
        return $r;
    }

    // 更新或新增資料
    function upd($table, $data, $id, $insert) {
        global $pdo;
        // 如果是新增資料，新增一筆後取得新資料的ID
        if($insert) {
            All("insert into ".$table." (id) values (null)");
            $id = $pdo->lastInsertId();
        }
        foreach($data as $key=>$value) {
            All("update ".$table." set ".$key." = '".$value."' where id = '".$id."'");
        }

        // 如果有上傳檔案
        if(!empty($_FILES["pic"])) {
            $time = strtotime("now");
            $ext = pathinfo($_FILES["pic"]["name"], PATHINFO_EXTENSION);
            $fn = $time.".".$ext;
            copy($_FILES["pic"]["tmp_name"], "img/".$fn);
            All("update ".$table." set pic = '".$fn."' where id = '".$id."'");
        }
    }

    // 商品清單
    function itemlist($data, $del) {
        // 總金額
        $totalmoney = 0;
        foreach($data as $k=> $v) {
            $row =  All("select * from item where id = '".$k."'")[0];
            $money = $v*$row["price"];
            $totalmoney += $money;
            echo "
            編號:".$row["id"]."<br>
            商品名稱:".$row["name"]."<br>
            數量:".$v."<br>
            庫存量:".$row["qt"]."<br>
            單價:".$row["price"]."<br>
            小計:".$money."<br>";
            
            if($del) echo "<input type='button' value='刪除' onclick='lof(\"api.php?do=delcart&id=".$k."\")'>";
            
            echo "<hr>";
        }
        echo "總金額:".$totalmoney;
    }

    // 顯示使用者資料
    function userdata($user) {
        $row = All("select * from user where id = '".$user."'")[0];
        echo "
            姓名:".$row["name"]."<br>
            帳號:".$row["acc"]."<br>
            電話:".$row["tel"]."<br>
            住址:".$row["address"]."<br>
            電子信箱:".$row["mail"]."<br>
            <hr>";
    }
?>