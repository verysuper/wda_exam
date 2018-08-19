<style>
  .movie_list{
    width:200px;
    height:200px;
    display:inline-block;
    margin:1px 1px;
  }
</style>
<?php
  $sql="select * from vv where vvdisplay=1";
  $vvArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $p=1;
  if(!empty($_GET['p'])){
    $p=$_GET['p'];
  }
  $start=($p-1)*4;
  $end=count($vvArr);
  for($i=$start;$i<$start+4;$i++){
    if($i<$end){
      ?>
<div class='movie_list'>
<table width="100%" border="0">
  <tr>
    <td colspan="2">片名:<?=$vvArr[$i]['vvname']?></td>
    </tr>
  <tr>
    <td rowspan="2">
      <img src="imgs/<?=$vvArr[$i]['vvpic']?>" width='100px'>
    </td>
    <td>分級:<img src="assets/03C0<?=$vvArr[$i]['vvlv']?>.png"></td>
  </tr>
  <tr>
    <td>上映日期:<?=$vvArr[$i]['vvondate']?></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="button" name="button" id="button" value="劇情簡介" />
      <input type="button" name="button2" id="button2" value="線上訂票" /></td>
    </tr>
</table>
</div>
      <?php
    }
  }
  $totalp=ceil($end/4);
  for($i=1;$i<=$totalp;$i++){
    ?><a href="?p=<?=$i?>"><?=$i?></a><?php
  }
?>

