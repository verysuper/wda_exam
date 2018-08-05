<?php
  //edit
  if(isset($_POST['edit'])){
    foreach($_POST as $key=>$value){
      $$key = $value;
    }
    $sql="update user set name='{$name}',
    mail='{$mail}',address='{$address}',tel='{$tel}'
     where id='{$id}'";
     $conn->query($sql);
  }
  //resd
  if(isset($_GET['id'])){
    $sql="select * from user where id='{$_GET['id']}'";
    $row=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
  }  
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
<caption><h1>編輯會員資料</h1></caption>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><?=$row['acc']?></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp">****</td>
  </tr>
  <tr>
    <td class="tt ct">累積交易額</td>
    <td class="pp">9999</td>
  </tr>
  <tr>
    <td class="tt ct">姓名</td>
    <td class="pp"><input name="name" value="<?=$row['name']?>" required/></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><input name="mail" value="<?=$row['mail']?>" required/></td>
  </tr>
  <tr>
    <td class="tt ct">地址</td>
    <td class="pp"><input name="address" value="<?=$row['address']?>" required/></td>
  </tr>
  <tr>
    <td class="tt ct">電話</td>
    <td class="pp"><input name="tel" value="<?=$row['tel']?>" required/></td>
  </tr>
  <tr class="ct">
    <td colspan="2">
      <input type="hidden" name="id" value="<?=$row['id']?>">
      <input type="submit" name="edit" id="button" value="編輯" />
      <input type="reset" name="button2" id="button2" value="重置" />
      <a href="?redo=mem1"><input type="button" value="取消"/></a><!-- note:a+button -->
    </td>
  </tr>
</table>
</form>
