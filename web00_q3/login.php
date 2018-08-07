<?php
include_once("head.php");
if(!empty($_POST["myid"])){
  if(($_POST["myid"] =="admin") and ($_POST["mypw"] =="1234")){
    $_SESSION["login"] = "admin";
    ?><script>document.location.href="admin.php"</script><?php
  }
}
?>
  <div id="mm">
<form method="post">
<table width="100%" border="1" cellspacing="0" cellpadding="3">
  <tr>
    <td align="center">帳號</td>
    <td align="center"><input name = "myid"></td>
  </tr>
  <tr>
    <td align="center">密碼</td>
    <td align="center"><input type ="password" name = "mypw"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="登入"></td>
    </tr>
</table>
</form>
  </div>
<?php include_once("footer.php")?>