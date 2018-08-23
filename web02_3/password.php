<?php
  $msg="";
  if(isset($_POST['getpw'])){
    $sql="SELECT * FROM user WHERE mail='{$_POST['mail']}'";
    $result=$conn->query($sql);
    if($result->rowCount()==1){
      $msg='您的密碼為：'.$result->fetch(PDO::FETCH_ASSOC)['pw']; 
    }else{
      $msg='查無此資料';
    }
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td>請輸入信箱以查詢密碼</td>
  </tr>
  <tr>
    <td>
      <input type="text" name="mail" required /><br>
      <?=$msg?>
    </td>
  </tr>
  <tr>
    <td><input type="submit" name="getpw" id="button" value="尋找" /></td>
  </tr>
</table>
</form>
