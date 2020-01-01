?=($_SESSION['name']!='admin'||(empty($_SESSION))) ?"<script>alert('你來錯地方囉~');lof('index.php');</script>":""?>
會員修改
<form id="form" method="post" action="api.php?do=editu&id=<?=$_GET["id"]?>">
姓名<input type="text" name="name"><br>
帳號<input type="text" name="acc" id="a"><input type="button" value="檢測帳號" onclick="chk(0)"><br>
密碼<input type="password" name="pw"><br>
電話<input type="text" name="tel"><br>
住址<input type="text" name="adr"><br>
電子信箱<input type="text" name="mail"><br>
<input type="button" value="送出" onclick="chk(1)">
<script>
	function chk(submit)
	{
        // 獲取帳號欄位的值
        var a = $("#a").val();
        // 如果帳號輸入admin，直接跳出訊息
        if(a == "admin")	alert("無法使用admin當帳號");
        // 如果不是，檢查帳號
		else
		{
            // 使用ajax向api.php要資料
			$.post("api.php?do=chk", {a}, function(r){
                // 如果回傳ok
				if(r == "ok")
				{
                    // 如果submit為1，送出註冊表單
                    if(submit)	$("#form").submit();
                    // 如果為0，只是單純的檢查帳號
					else alert("帳號可以使用");
				}
				else alert("帳號無法使用");
			})	
		}
	}
</script>