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
<script src="script/jquery-3.4.1.min.js"></script>
<script>
    function lof(x) {
        location.href = x
    }
</script>
<?php include 'sqlconn.php' ?>
<?=($_SESSION['name']!='admin'||(empty($_SESSION))) ?"<script>alert('你來錯地方囉~');lof('index.php');</script>":""?>
<body>   
    <header>
        <img src="img/jackson.jpg" width=700px>
        <nav id="items">
            <ul>
                <li><a href='index.php'>返回主頁</a></li>
                <li><a href="api.php?do=out">登出</a></a></li>
            </ul>
        </nav>
    </header>
    <aside>
        <div id="left">
            <div class="sidebar"><a href="?redo=th">新增分類</a></div>
            <div class="sidebar"><a href="?redo=item">管理商品</a>
                <div class="small"><a href="?redo=nitem">新增商品</a></div>
            </div>
            <div class="sidebar"><a href="?redo=order">管理訂單</a></div>
            <div class="sidebar"><a href="?redo=mem">管理使用者</a></div>
        </div>
    </aside>
    <article>
        <?php
        if (!empty($_GET["redo"]))    include("a" . $_GET["redo"] . ".php");
        else echo "請選擇管理項目";
        ?>
    </article>
    <footer>
        <p><?= $footer?></p>
    </footer>
</body>