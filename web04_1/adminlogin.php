<?php
    if(isset($_POST['acc_admin']) && isset($_POST['pw_admin']) && isset($_POST['checkCode'])){
      if($_POST['checkCode']==$_SESSION['checkCode']){
        $sql="select * from admin where acc='{$_POST['acc_admin']}' and pw='{$_POST['pw_admin']}'";
        $result=$conn->query($sql)->rowCount();
        // echo $result;
        if($result>0){
          $_SESSION['admin']=$_POST['acc_admin'];
          ?><script>document.location.href='admin.php'</script><?php
        }else{
          ?><script>alert('對不起，您輸入的帳號密碼有誤請您重新登入');</script><?php
        }
      }else{
        ?><script>alert('對不起，您輸入的驗證碼有誤請您重新登入');</script><?php
      }
    }

?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc_admin" required/></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw_admin" required/></td>
  </tr>
  <tr>
    <td class="tt ct">驗證碼</td>
    <td class="pp">
      <?php
        $a=rand(10,99);
        $b=rand(10,99);
        $_SESSION['checkCode'] =$a+$b;
        echo $a."+".$b."=".$_SESSION['checkCode'];
      ?>
      <input type="text" name="checkCode" required/>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="確認"/></td>
  </tr>
</table>
</form>
