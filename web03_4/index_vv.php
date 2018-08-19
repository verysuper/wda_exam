<style>
  .vvList{
    width:200px;
    height:200px;
    display:inline-block;
    background-color:#000;
    margin:1px 1px;
  }
</style>
<?php
  $sql="select * from vv where display=1 and ondate > curdate()-3";
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
        <div class='vvList'>
          <table width="100%" border="0">
          <tr>
            <td colspan="2" align="center">片名:<?=$vvArr[$i]['name']?></td>
            </tr>
          <tr>
            <td rowspan="2">
              <img src="imgs/<?=$vvArr[$i]['pic']?>" width='100'>
            </td>
            <td>分級:<img src="assets/03C0<?=$vvArr[$i]['lv']?>.png"></td>
          </tr>
          <tr>
            <td>上映日期:<?=$vvArr[$i]['ondate']?></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
              <a href="vvinfo.php?id=<?=$vvArr[$i]['id']?>"><input type="button" value="劇情簡介" /></a>
              <a href="ticket1.php?id=<?=$vvArr[$i]['id']?>"><input type="button" value="線上訂票" /></a>
              </td>
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

