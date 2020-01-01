<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="kidneyweakx">
    <!--SEO Meta-->
    <meta name="name" content="中山麥克網">
    <meta name="description" content="中山麥克網專門賣課，最優良的師資及精選的課程等你挑選">
    <title>中山麥克網</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<!-- 計算人數腳本 -->
<script async src="//busuanzi.ibruce.info/busuanzi/2.3/busuanzi.pure.mini.js"></script>
<script src="script/jquery-3.4.1.min.js"></script>
<script>
function lof(x)
{
	location.href=x
}</script>
<?php include 'sqlconn.php' ?>
<body>
    <!--標頭-->
    <header>
        <img src="img/jackson.jpg" width=700px>
        <nav id="items">
            <ul>
                <li><a href="?"> 回首頁 </a> </li>
                <li><a href="?do=news"> 最新消息 </a> </li>
                <li><a href="?do=intro"> 購物流程 </a> </li>
                <li><a href="?do=cart"> 購物車 </a> </li>
                <li><a href="<?= (empty($_SESSION)) ? "?do=login" : "api.php?do=out" ?>"><?= (empty($_SESSION)) ? "會員登入" : "登出" ?></a> </li>
                <?= (!empty($_SESSION)) ? ($_SESSION['name']=='admin')?"<li><a href='admin.php'>管理介面</a></li>" : "<li><a href='?do=cart'>HI! ".$_SESSION['name']."</a></li>" :""  ?>              
            </ul>
        </nav>
    </header>
    <marquee>單身節1111特惠活動 &nbsp; 為了慶祝單身節，將在1111學習程式的同學開啟免費課程~ </marquee>

    <aside>
        <div id="left">
            <!--商品區-->
            <div class="sidebar"><a href="?c=0">全部商品(<?= (count(All("select * from item where sell = 1"))) ?>)</a></div>
            <?php
            //大分類
            $result = All("select * from category where tree = 0");
            foreach ($result as $row) {
                $c = count(All("select * from item where c1 = '" . $row["id"] . "'"));
                echo "<div class='sidebar'><a href='?c=" . $row["id"] . "'>" . $row["name"] . "(" . $c . ")</a>";

                //中分類
                $result2 = All("select * from category where tree = '" . $row["id"] . "'");
                foreach ($result2 as $row2) {
                    $cc = count(All("select * from item where c2 = '" . $row2["id"] . "'"));
                    echo "<div class='small'><a href='?c=" . $row2["id"] . "'>" . $row2["name"] . "(" . $cc . ")</div></a>";
                }

                echo "</div>";
            }
            ?>
            <div id="countnum">
                <span id="busuanzi_container_site_pv">進站總訪問次數<br> <span id="busuanzi_value_site_pv"></span> 次</span>
            </div>
    </aside>

    <article>
        <?php
        // 載入全部商品
        $p = "main";
        if (!empty($_GET["do"]))    $p = $_GET["do"];
        // 購物流程
        if ($p == "intro")    echo "<div id='tc'><img src='img/0401.jpg' width= 65%></div>";
        // 最新消息
        elseif ($p == "news") echo "<h1>最新消息</h1>年終特賣會開跑了<br>單身節特惠活動";
        else include($p . ".php");
        ?>
    </article>

    <footer>
        <p><?= $footer ?></p>
    </footer>
</body>

</html>