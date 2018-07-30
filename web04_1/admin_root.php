<?php
  if($_GET['ga']=='delete'){
    echo 'delete 網頁還在做';
  }
//____________________________________________________________________
  //update_2
  if(isset($_POST['update_root']) && $_POST['update_root']=='送出'){
    echo 'update 網頁還在做';
  }
  //update_1
  if($_GET['ga']=='update'){
      ?>
    <form action="" method="post">
<table width="80%" border="0" align="center">
<caption><h1>修改管理員權限</h1></caption>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="root" /></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw" /></td>
  </tr>
  <tr>
    <td class="tt ct">權限</td>
    <td class="pp">
      <input type="checkbox" name="r1" value="1" />商品分類與管理<br>
      <input type="checkbox" name="r2" value="1" />訂單管理<br>
      <input type="checkbox" name="r3" value="1" />會員管理<br>
      <input type="checkbox" name="r4" value="1" />頁尾版權管理<br>
      <input type="checkbox" name="r5" value="1" />最新消息管理<br>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="update_root" id="" value="送出" />
      <input type="reset" name="" id="" value="重設" />
    </td>
  </tr>
</table>
</form>
    <?php
  }
//____________________________________________________________________
  //insert_2
  if(isset($_POST['insert_root']) && $_POST['insert_root']=='送出'){
    if(isset($_POST['root']) && isset($_POST['pw'])){
      $root=$_POST['root'];
      $pw=$_POST['pw'];
      isset($_POST['r1'])?$r1=1:$r1=0;
      isset($_POST['r2'])?$r2=1:$r2=0;
      isset($_POST['r3'])?$r3=1:$r3=0;
      isset($_POST['r4'])?$r4=1:$r4=0;
      isset($_POST['r5'])?$r5=1:$r5=0;
      $permit=$r1.$r2.$r3.$r4.$r5;
      $sql="insert into admin values(null,'{$root}','{$pw}','{$permit}',1)";
      $result=$conn->query($sql);
      ?><script>document.location.href='admin.php?redo=list'</script><?php
    }
  }
  //insert_1
  if($_GET['ga']=='insert'){
    ?>
    <form action="" method="post">
<table width="80%" border="0" align="center">
<caption><h1>新增管理帳號</h1></caption>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="root" required/></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw" required/></td>
  </tr>
  <tr>
    <td class="tt ct">權限</td>
    <td class="pp">
      <input type="checkbox" name="r1" value="1" />商品分類與管理<br>
      <input type="checkbox" name="r2" value="1" />訂單管理<br>
      <input type="checkbox" name="r3" value="1" />會員管理<br>
      <input type="checkbox" name="r4" value="1" />頁尾版權管理<br>
      <input type="checkbox" name="r5" value="1" />最新消息管理<br>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="insert_root" id="" value="送出" />
      <input type="reset" name="" id="" value="重設" />
    </td>
  </tr>
</table>
</form>
    <?php
  }
?>
