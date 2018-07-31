<?php
include_once("head.php");
$sql = "select * from item_2 where i2_i1 = '".$_POST["tb"]."'";
$ro3 = mysqli_query($link,$sql);
$list_i2 = mysqli_fetch_assoc($ro3);
?>
            <select name="select_i7">
              <option>請選擇中類</option>
<?php do{?>
              <option value="<?=$list_i2["i2_seq"]?>"><?=$list_i2["i2_name"]?></option>
<?php }while($list_i2 = mysqli_fetch_assoc($ro3));?>
            </select>