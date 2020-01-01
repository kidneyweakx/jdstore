<!--  新增大分類 -->
<form action="api.php?do=nc1" method="post">新增大分類
    <input type="text" name="c1"><input type="submit"></form>
<!--  新增中分類 -->
<form action="api.php?do=nc2" method="post">新增中分類
    <select name="c1">
        <?php
        $result = All("select * from category where tree = 0");
        foreach($result as $row)
        {
            ?>
            <option value="<?=$row["id"]?>"><?=$row["name"]?></option>
            <?php
        }
        ?>
    </select>
    <input type="text" name="c2"><input type="submit">
</form>
<!--  編輯分類 -->
<form action="api.php?do=ec" method="post">
    <?php
        $result = All("select * from category where tree = 0");
        foreach($result as $row) {
            echo "<input type='text' value='".$row["name"]."' name='text[]'>
            <input type='hidden' value='".$row["id"]."' name='id[]'>
            <input type='checkbox' value='".$row["id"]."' name='del[]'><br>";
            
            $result2 = All("select * from category where tree = '".$row["id"]."'");
            foreach($result2 as $row2) {
                echo 
                "<input type='text' value='".$row2["name"]."' name='text[]'>
                <input type='hidden' value='".$row2["id"]."' name='id[]'>
                <input type='checkbox' value='".$row2["id"]."' name='del[]'><br>";
            }
            echo "<hr>";
        }
    ?>
    <input type="submit">
</form>