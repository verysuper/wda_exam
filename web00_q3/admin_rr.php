<?php
if(!empty($_POST["popname"])){
  $pname = $_POST["popname"];
  $ttt = date("YmdHis",$tt).".jpg";
  $sql="insert into pp value(null,'".$pname."','".$ttt."','0','0');";
  mysqli_query($link,$sql);
  copy($_FILES["popfile"]["tmp_name"],"pimg/".$ttt);
}
if(!empty($_POST["pn"][0])){
  $sql="update pp set p_look = 0";
  mysqli_query($link,$sql);
  for($i=0;$i<count($_POST["pl"]);$i++){//修改顯示
    $pl = $_POST["pl"][$i];
    $sql="update pp set p_look = 1 where p_seq ='$pl'";
    mysqli_query($link,$sql);
  }
  for($i=0;$i<count($_POST["pno"]);$i++){//修改內容
    $pn = $_POST["pn"][$i];
    $pd = $_POST["pd"][$i];
    $pno = $_POST["pno"][$i];
    $sql="update pp set p_name = '$pn' ,p_desc = '$pd' where p_seq ='$pno'";
    mysqli_query($link,$sql);
  }
  for($i=0;$i<count($_POST["del"]);$i++){//刪除
    $del = $_POST["del"][$i];
    $sql="delete from pp where p_seq ='$del'";
    mysqli_query($link,$sql);
  }
}

  $sql="select * from pp";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);

if(!empty($_POST["l_p"])){
  $plook = $_POST["l_p"];
  $sql="update look_pic set l_p_look = '$plook'";
  mysqli_query($link,$sql);
}
  $rsql="select * from look_pic";
  $rro = mysqli_query($link,$rsql);
  $rrr = mysqli_fetch_assoc($rro);
?>
<form method="post" >
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="4" align="center">預告片清單</td>
  </tr>
  <tr>
    <td align="center">預告片海報</td>
    <td align="center">預告片片名</td>
    <td align="center">預告片排序</td>
    <td align="center">操作</td>
  </tr>
<?php do{?>
<input type = "hidden" name="pno[]" value="<?=$rr["p_seq"]?>">
  <tr>
    <td align="center"><img src="pimg/<?=$rr["p_pic"]?>" width="100"></td>
    <td align="center"><input name="pn[]" value="<?=$rr["p_name"]?>"></td>
    <td align="center"><input name="pd[]" value="<?=$rr["p_desc"]?>"></td>
    <td align="center">
      顯示 <input type = "checkbox" name="pl[]" value="<?=$rr["p_seq"]?>" <?php if($rr["p_look"] == 1){ echo "checked";}?>> 
      刪除 <input type = "checkbox" name="del[]" value="<?=$rr["p_seq"]?>">
    </td>
  </tr>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
  <tr>
    <td colspan="4" align="center">
      <input type="submit" value="送出" />
    </td>
  </tr>
</table>
</form>
<br>

<form method="post">
<table width="100%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td align="center">淡入/淡出<input name="l_p" type="radio" value="1" <?php if($rrr["l_p_look"] == 1){?>checked="checked" <?php }?>/></td>
    <td align="center">滑入<input name="l_p" type="radio" value="2"<?php if($rrr["l_p_look"] == 2){?> checked="checked" <?php }?>/></td>
    <td align="center">縮放<input name="l_p" type="radio" value="3"<?php if($rrr["l_p_look"] == 3){?> checked="checked" <?php }?>/></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" value="修改轉場效果"></td>
  </tr>
</table>
</form>

<br>
<form method="post" enctype="multipart/form-data">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td align="center">新增預告片海報</td>
  </tr>
  <tr>
    <td align="center">
      預告片海報
      <input type="file" name="popfile" />
      預告片片名
      <input type="text" name="popname" /></td>
  </tr>
  <tr>
    <td align="center">
      <input type="submit" value="送出" />
    </td>
  </tr>
</table>
</form>