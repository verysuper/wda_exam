<?php
  if(isset($_POST['acc_user']) && isset($_POST['pw_user']) && isset($_POST['checkCode'])){    
    if($_POST['checkCode']==$_SESSION['checkCode']){
      //echo 'success';
      $sql="select * from user where acc='{$_POST['acc_user']}' and pw='{$_POST['pw_user']}'";
      $result=$conn->query($sql)->rowCount();
      if($result>0){
        $_SESSION['user']=$_POST['acc_user'];
        ?><script>document.location.href='?'</script><?php
      }else{
        ?><script>alert('對不起，您輸入的帳號密碼有誤請您重新登入');</script><?php
      }
    }else{
      ?><script>alert('對不起，您輸入的驗證碼有誤請您重新登入');</script><?php
    }
  }
?>
<h1>第一次購物</h1>
<a href="?do=userReg"><img src="assets/0413.jpg" height='90'></a>
<h1>第一次購物</h1>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc_user" required/></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw_user" required/></td>
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

