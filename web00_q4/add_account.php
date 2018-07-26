<?php
if(!empty($_POST["my_name"])){
  $my_name = $_POST["my_name"];
  $my_id = $_POST["my_id"];
  $my_pw = $_POST["my_pw"];
  $my_tel = $_POST["my_tel"];
  $my_con = $_POST["my_con"];
  $my_email = $_POST["my_email"];
  if($my_id != "admin"){
    $od = $_POST["my_id"];
    $sql="select * from account where a_id = '".$my_id."'";
    $rr = mysqli_query($link,$sql);
    $totle = mysqli_num_rows($rr);
    if($totle == 0){
      $sql="insert into account value (null, '".$my_name."', '".$my_id."', '".$my_pw."', '".$my_tel."', '".$my_con."', '".$my_email."', '".$now_day."')";
      mysqli_query($link,$sql);
      ?><script>document.location.href="/?do=login"</script><?php      
    }
  }
}
?>
<script src="jquery-1.8.3.min.js"></script>
<script>
  function check_id(){
    var my_id=document.getElementById("my_id").value;
    if(my_id != "admin"){
      $.post("check_id_api.php",{my_id},function(oo){
        if(oo==0){alert("帳號可以使用");}else{alert("帳號已重複");}
      });
    }else{
      alert("不得使用ADMIN作為帳號註冊");
    }
  }
</script>
<form method="post" name="ccc">
<table width="95%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td align="center" width="30%">姓名</td>
    <td align="left"><input name="my_name"></td>
  </tr>
  <tr>
    <td align="center" width="30%">帳號</td>
    <td align="left"><input name="my_id" id="my_id" ><input type="button" value="檢測帳號" onclick="check_id()"></td>
  </tr>
  <tr>
    <td align="center">密碼</td>
    <td align="left"><input type="password" name="my_pw"></td>
  </tr>
  <tr>
    <td align="center" width="30%">電話</td>
    <td align="left"><input name="my_tel"></td>
  </tr>
  <tr>
    <td align="center" width="30%">地址</td>
    <td align="left"><input name="my_con"></td>
  </tr>
  <tr>
    <td align="center" width="30%">電子信箱</td>
    <td align="left"><input name="my_email"></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" value="確認">
    </td>
  </tr>

</table>
</form>
