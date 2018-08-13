<?php
$sql="select * from vv where display = 1 and ondate > curdate()-3"; //***** ondate > curdate()-3
$vvArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// print_r($vvArr,true);
?>
<style>
.movie_list{
  width:200px;
  height:175px;
  display:inline-block;
  background-color:#000;
  margin:1px 1px;
}
</style>
<?php
  $p=1;
  if(!empty($_GET['p'])){
    $p=$_GET['p'];
  }
  $start=($p-1)*4;
  $end=count($vvArr);
  for($i=$start;$i<$start+4;$i++){
    if($i<$end){
    ?>
      <div class="movie_list">
        <table width="80%" border="0" align="center">
        <tr>
          <td colspan="2">片名:<?=$vvArr[$i]['name']?></td>
          </tr>
        <tr>
          <td rowspan="2"><a href="index_movieinfo.php?vv=<?=$vvArr[$i]['id']?>"><img src="imgs/<?=$vvArr[$i]['poster']?>" alt="" width=80></a></td>
          <td>分級: <img src="assets/03C0<?=$vvArr[$i]['lv']?>.png" alt=""> </td>
        </tr>
        <tr>
          <td>上映日期:<?=$vvArr[$i]['ondate']?></td>
        </tr>
        <tr>
          <td><a href="index_movieinfo.php?vv=<?=$vvArr[$i]['id']?>"><input type="button" name="button" id="button" value="劇情簡介" /></a></td>
          <td><input type="button" name="button2" id="button2" value="線上訂票" /></td>
        </tr>
      </table>
      </div>
    <?php
    }
  }
?>
<div class="ct">
  <?php
    $totalp=ceil($end/4);
    for($i=1;$i<=$totalp;$i++){
      ?>
        <a href="?p=<?=$i?>"><?=$i?></a>
      <?php
    }
  ?>
</div>
