<?php
  include_once '_config.php';
  if(!empty($_GET['msess'])){
    foreach($_GET as $key => $value){
      $$key=$value;
    }
    $sql="select * from ticket where mid='{$mid}' and mdate='{$mdate}' and msess='{$msess}'";
    $rows=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $chairArr=array();
    foreach($rows as $row){
      $chairArr[]=$row['mchair'];
    }
  }
?>
<style>
  .chair{
    width:60px;
    height:100px;
    display:inline-block;
    background-color:#ff0;
    float:left;
  }
</style>
<form action="ticket3.php" method="post"><table width="80%" border="1" align="center">
  <tr>
    <td align="center">
      <div style="width:300px;height:400px;background-color:#f00;"><!-- (60*5)*(100*4) -->
        <?php
          for($i=0;$i<4;$i++){
            for($j=0;$j<5;$j++){
              ?><div class="chair"><?php
              if(in_array($i.$j,$chairArr)){
                ?>
                  <?=$i?>排<?=$j?>號
                  <img src="assets/03D03.png">                  
                <?php
              }else{
                ?>
                  <?=$i?>排<?=$j?>號
                  <img src="assets/03D02.png">
                  <input type="checkbox" name="chair[]" value="<?=$i.$j?>" onclick="docheck(this)" /><!-- ************** -->
                <?php
              }
              ?></div><?php
            }//for end
          }//for end
        ?>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      已選擇的電影:<?=$mname?><br>
      觀看日期及時刻:<?=$mdate." ".$msess?><br>
      已選擇的票數:<span id="qt"></span>
    </td>
  </tr>
  <tr>
    <td align="center">
      <input type="hidden" name="mid" value="<?=$mid?>">
      <input type="hidden" name="mname" value="<?=$mname?>">
      <input type="hidden" name="mdate" value="<?=$mdate?>">
      <input type="hidden" name="msess" value="<?=$msess?>">
      <input type="button" value="上一步" onclick="cl('#cover')"/>
      <input type="submit" name="chkout" value="訂購" />
    </td>
  </tr>
</table></form>
<script>
  var c=0;limit=4;
  function docheck(obj){
    obj.checked?c++:c--;
    if(c>limit){
      alert('您已購買4張');
      obj.checked=false;
      c--;
    }else{
      $('#qt').html(c);
    }
  }
</script>
