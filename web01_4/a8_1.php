<?php
  if(isset($_POST['a8_2'])){
    if($_POST['pw']==$_POST['chkpw']){
      $sql="INSERT INTO `admins` VALUES(null,'{$_POST['acc']}','{$_POST['pw']}','1')";
      $conn->query($sql);
    }else{
      ?><script>alert('密碼不相同')</script><?php
    }
  }
  if(isset($_POST['a8_1'])){
    for($i=0;$i<count($_POST['id']);$i++){
      $sql="UPDATE `admins` SET acc='{$_POST['acc'][$i]}',pw='{$_POST['pw'][$i]}' WHERE id='{$_POST['id'][$i]}'";
      $conn->query($sql);
    }
    // for($i=0;$i<count($_POST['display']);$i++){
    //   $sql="UPDATE `admins` SET display='1' WHERE id='{$_POST['display'][$i]}'";
    //   $conn->query($sql);
    // }
    if(isset($_POST['del'])){
      for($i=0;$i<count($_POST['del']);$i++){
        $sql="DELETE FROM `admins` WHERE id='{$_POST['del'][$i]}'";
        $conn->query($sql);
      }
    }
  }
?>
<p class="t cent botli">管理者帳號管理</p>
<form method="post" action="">
<table width="100%">
<tbody>
  <tr class="yel">
    <td width="40%">帳號</td>
    <td width="49%">密碼</td>
    <td width="11%">刪除</td>
    </tr>
  <?php
    $sql="SELECT * FROM `admins` where type='1'";
    $result=$conn->query($sql);
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?>
        <tr class="yel">
          <td width="40%">
            <input type="text" name="acc[]" value="<?=$row['acc']?>" style="width:80%;"/>
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
          </td>
          <td width="49%">
            <input type="text" name="pw[]" value="<?=$row['pw']?>" style="width:80%;"/>
          </td>
          <td width="11%"><input type="checkbox" name="del[]" value="<?=$row['id']?>" /></td>
        </tr>
      <?php
    }
  ?>
</tbody></table>
<table style="margin-top:40px; width:70%;">
<tbody>
<tr>
<td width="200px">
<input type="button" onclick="op('#cover','#cvr','a8_2.php')" value="新增管理者帳號"></td><td class="cent">
<input type="submit" value="修改確定" name="a8_1">
<input type="reset" value="重置">
</td>
</tr>
</tbody></table>   
</form>
