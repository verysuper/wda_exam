<?php
  include_once("head.php");

?>
<style>
  #ding{
    width:375px;
    min-height:320px;
    margin:0 auto;
  }
  .dingwa{
    width:60px;
    height:100px;
    display:inline-block;
    margin:5px;
  }
  .cb{
    width:20px;
    height:20px;
    margin:0 auto;
  }
</style>
  <div id="mm">
    <div id = "ding">
<?php
  for($i=1;$i<=20;$i++){
    $j = ceil($i/5);
    $k = $i - (($j - 1) * 5) ;
?>
      <div class="dingwa">
        <img src="images/a0.png"><br>
        <?=$j?>排-<?=$k?>號<br>
        <div class="cb"><input type="checkbox" name="aa"></div>
      </div>
<?php }?>
    </div>
  </div>
<?php include_once("footer.php")?>