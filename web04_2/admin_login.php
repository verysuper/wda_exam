<?php
  if(isset($_POST['adminlogin'])){    
    foreach($_POST as $key=>$value){
      $$key = $value;
    }
    if($_SESSION['checkcode']==$checkcode){
      $sql="select * from admin where acc='{$acc}' and pw='{$pw}'";
      if($conn->query($sql)->rowCount()>0){
        $_SESSION['admin']=$acc;
        header("location:admin.php");
        exit();
      }else{
        ?><script>alert('對不起，您輸入的帳號密碼有誤請您重新輸入');</script><?php
      }
    }else{
      ?><script>alert('對不起，您輸入的驗證碼有誤請您重新輸入');</script><?php
    }
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp"><input type="text" name="acc" required/></td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw" required/></td>
  </tr>
  <tr>
    <td class="tt ct">驗證碼</td>
    <td class="pp">
    <?php 
      $a=rand(10,99);
      $b=rand(10,99);
      $_SESSION['checkcode']=$a+$b;
      echo  $a."+".$b."=".$_SESSION['checkcode'];
    ?>
      <input type="text" name="checkcode" required/>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="ct">
      <input type="submit" name="adminlogin" id="button" value="送出" />
    </td>
  </tr>
</table>

</form>
