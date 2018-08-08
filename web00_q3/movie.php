<?php
$page=1;
$gb = 4;
if(!empty($_GET["page"])){ $page = $_GET["page"];}
$opsearch = ($page -1) * $gb; 
$sql = "select * from move where m_look = 1 and m_day > '$td'";
$ro = mysqli_query($link,$sql);
$total = mysqli_num_rows($ro);
$total_page = ceil($total/$gb);
$sql = "select * from move where m_look = 1 and m_day > '$td' order by m_desc desc limit $opsearch,$gb";
$ro = mysqli_query($link,$sql);
$rr = mysqli_fetch_assoc($ro);
?>
<style>
.look_movie_list{
  width:200px;
  height:175px;
  display:inline-block;
  background-color:#ffa8e0;
  margin:5px 4px;
}
</style>
<?php do{?>
  <div class="look_movie_list">
    <table width="100%" border="1" cellspacing="0" cellpadding="3">
      <tr>
        <td colspan="2">片名:<?=$rr["m_name"]?></td>
      </tr>
      <tr>
        <td rowspan="2" width="80">
          <a href="look_movie.php?no=<?=$rr["m_seq"]?>">
            <img src="pic/<?=$rr["m_pic"]?>" width="80">
          </a>
        </td>
        <td>
          分級:<img src="images/<?=$rr["m_lv"]?>.png">
        </td>
      </tr>
      <tr>
        <td>
          上映日期:<br><?=$rr["m_day"]?>
        </td>
      </tr>
      <tr>
        <td>
          <input type="button" value="劇情簡介" onclick="document.location.href='look_movie.php?no=<?=$rr["m_seq"]?>'">
        </td>
        <td>
          <input type="button" value="線上訂票" onclick="document.location.href='ticket.php?no=<?=$rr["m_seq"]?>'">
        </td>
      </tr>
    </table>
  </div>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
<?php for($i=1; $i<=$total_page ; $i++){?> <a href="index.php?page=<?=$i?>"><?=$i?></a> <?php }?>