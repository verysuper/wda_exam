  <?php
include_once 'head.php';
if(isset($_POST['acc']) && isset($_POST['pw'])){
  $acc=strtolower($_POST['acc']);
  $pw=strtolower($_POST['pw']);
  if($acc=='admin' && $pw=='1234'){
    $_SESSION['admin']='admin';
  }
}
if(isset($_SESSION['admin']) && $_SESSION['admin']=='admin'){
  ?>
  <div id="mm">
    <div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;"> <a href="?do=admin&redo=tit">網站標題管理</a>| <a href="?do=admin&redo=go">動態文字管理</a>| <a href="?do=admin&redo=admin_rr">預告片海報管理</a>| <a href="?do=admin&redo=vv">院線片管理</a>| <a href="?do=admin&redo=order">電影訂票管理</a> </div>
    <div class="rb tab">
      <?php
      if(empty($_GET['redo'])){
?><h2 class="ct">請選擇所需功能</h2><?php
      }else{
        include_once $_GET['redo'].".php";
      }      
      ?>      
    </div>
  </div>
  <?php
}else{
  ?>
    <div id="mm">
  <form action="" method="post">
<table width="80%" border="0" align="center">
  <tr>
    <td>帳號:</td>
    <td><input type="text" name="acc" required /></td>
  </tr>
  <tr>
    <td>密碼</td>
    <td><input type="text" name="pw" required /></td>
  </tr>
   <tr>
    <td colspan="2">
    <input type="submit" name="button" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" />
      </td>
    </tr>
</table>
</form>
</div>
  <?php
}
include_once 'footer.php';
?>
