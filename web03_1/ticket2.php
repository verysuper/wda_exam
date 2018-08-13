<?php
  try{
    $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_3_1;charset=UTF8;","root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
  date_default_timezone_set('Asia/Taipei');
  session_start();
  foreach($_GET as $key => $value){
    $$key=$value;
  }
?>
<style>/******************/
  .chair{
    width:60px;
    height:100px;
    display:inline-block;
    margin:5px;
    background:#ff0;
  }/******************/
</style>
<form action="" method="post">
<table width="50%" border="0" align="center">
  <tr>
    <td>
      <?php
        for($i=0;$i<4;$i++){
          for($j=0;$j<5;$j++){
            ?><div class="chair">
            <?=$i?>排-<?=$j?>號
            <img src="assets/03D02.png" alt="">
            <input type="checkbox" name="chair[]" value="<?=$i.$j?>" onclick="doCheck(this);">
            </div><?php
          }
        }
      ?>
    </td>
  </tr>
  <tr>  
    <td>
      電影:<?=$mname?><br>
      時刻:<?=$mdate." ".$msess?><br>
      票數:<span id="qt1"></span>
    </td>
  </tr>
  <tr>
    <td class="ct">
      <input type="hidden" name="qt" id="qt2" value="">
      <input type="hidden" name="mname" value="<?=$mname?>">
      <input type="hidden" name="mdate" value="<?=$mdate?>">
      <input type="hidden" name="msess" value="<?=$msess?>">
      <input type="submit" name="button" id="button" value="訂購" />
      <input type="button" value="上一步" onclick="cl(&#39;#cover&#39;)"/>
    </td>
  </tr>
</table>
</form>

<script>
  var c=0,limit=4; 
  function doCheck(obj) { 
  obj.checked?c++:c--;   
  if(c>limit){ 
    obj.checked=false; 
    alert("超過4個了喔"); 
    c--; 
    }else{
      $('#qt1').html(c);
      $('#qt2').val(c);
    }    
  }
</script>
