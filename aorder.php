訂單管理<br>
<?php
    // 查詢訂單和使用者資訊
	$result = All("select ord.*, user.name, user.acc from ord, user where user.id = ord.user");
	foreach($result as $row)
	{
        // 下訂商品
        $item = unserialize($row["item"]);
        // 計算總金額
        $money = 0;
        // 訂單編號為日期數字
        $id = date("YmdHis",$row["time"]);
        // 查詢各商品的價格，計算總金額
		foreach($item as $k => $v)
		{
			$m = All("select price from item where id = '".$k."'")[0][0];
			$money += $m;
		}
		?>
		<a href="?redo=vorder&id=<?=$row["id"]?>">訂單編號:<?=$id?></a><br>
		金額:<?=$money?><br>
		帳號:<?=$row["acc"]?><br>
		姓名:<?=$row["name"]?><br>
		下單時間:<?=(date("Y/m/d", $row["time"]))?><br>
		<input type="button" onclick="lof('api.php?do=delorder&id=<?=$row["id"]?>')" value="刪除">
		<hr>
		<?php
	}
?>