<?php
    include("sqlconn.php");
    
    // 以 $_GET["do"] 來判斷要執行什麼動作
	switch($_GET["do"])	{
        // 登入
        case "in":
            // 查詢是否有這個帳號
			$result = All("select * from user where acc = '".$_POST["acc"]."' and pw = '".$_POST["pw"]."' ");
			$num = count($result);
            
			if($num > 0) {
				$_SESSION = $result[0];
				lo("index.php");
            }
			else echo "<script>alert('帳號或密碼錯誤'); window.location='index.php?do=login';</script>";
		break;        
        // 檢查帳號
        case "chk":
            // 查詢是否有這個帳號
			$num = count(All("select * from user where acc = '".$_POST["a"]."'"));
			if($num > 0) echo "x";
			else echo "ok";
		break;        
        // 註冊
		case "reg":
			$_POST["tt"] = strtotime("now");
            upd("user", $_POST, 10, 1);
			lo("index.php?do=login");
		break;        
        // 登出
		case "out":
			session_unset();
			session_destroy();
			lo("index.php");
        break;
        // 刪除購物車商品
        case "delcart":
            unset($_SESSION["cart"][$_GET["id"]]);
            lo("index.php?do=cart");
        break;
        // 結帳
        case "chkout":
            $cart = serialize($_SESSION["cart"]);
            $time = strtotime("now");
            $d = array(
                "user" => $_SESSION["id"],
                "item" => $cart,
                "time" => $time
            );
            upd("ord", $d, 0, 1);
            unset($_SESSION["cart"]);
            lo("index.php");
        break;

        // admin登入
        case "ain":
            // 是否有這個帳號
            $row = All("select * from user where acc = '".$_POST["acc"]."' and pw = '".$_POST["pw"]."'")[0];
            $num = count($row);
            if($num > 0 & $row["name"]=='admin') {
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["permit"] = unserialize($row["permit"]);
                    lo("admin.php");
                }
            else if($num > 0) echo "<script>alert('非admin'); window.location='index.php?do=ain';</script>";
            else echo "<script>alert('帳號或密碼錯誤'); window.location='index.php?do=ain';</script>";
        break;

        // 商品相關
        // 新增商品
        case "nitem":
            // 上架
            $_POST["sell"] = 1;
            upd("item", $_POST, 0, 1);
            lo("admin.php?redo=nitem");
        break;
        // 編輯商品
        case "eitem":
            upd("item", $_POST, $_GET["id"], 0);
            lo("admin.php?redo=item");
        break;
        // 刪除商品
        case "delitem":
            All("delete from item where id = '".$_GET["id"]."'");
            lo("admin.php?redo=item");
        break;

        // 上架
        case "sell":
            All("update item set sell = 1 where id = '".$_GET["id"]."'");
            lo("admin.php?redo=item");
        break;

        // 下架
        case "usell":
            All("update item set sell = 0 where id = '".$_GET["id"]."'");
            lo("admin.php?redo=item");
        break;
        // 新增大類
        case "nc1":
            All("insert into category values(null, '".$_POST["c1"]."', 0)");
            lo("admin.php?redo=th");
        break;
        // 新增中類
        case "nc2":
            All("insert into category values(null, '".$_POST["c2"]."', '".$_POST["c1"]."')");
            lo("admin.php?redo=th");
        break;
        // 修改分類
        case "ec":
            // 更新名稱
            for($i=0;$i<count($_POST["id"]);$i++)   {
                All("update category set name = '".$_POST["text"][$i]."' where id = '".$_POST["id"][$i]."'");
            }
            // 刪除分類
            foreach($_POST["del"] as $d)    {
                All("delete from category where id = '".$d."'");
            }
            lo("admin.php?redo=th");
        break;

        // 表單獲取中分類
        case "getc2":
            $r = "";
            $result = All("select * from category where tree = '".$_POST["c1"]."'");
            foreach($result as $row)    {
                $r .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
            }
            echo $r;
        break;  
        
        // 管理訂單
        case "delorder":
            All("delete from ord where id = '".$_GET["id"]."'");
            lo("admin.php?redo=order");
        break;

        // 管理使用者
        case "delu":
            All("delete from user where id = '".$_GET["id"]."'");
            lo("admin.php?redo=mem");
        break;
        case "editu":
            upd("user", $_POST, $_GET["id"], 0);
            lo("admin.php?redo=mem");
        break;
    }        
?>