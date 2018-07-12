<?php
$link =mysqli_connect("localhost","root","","db00_q1");
mysqli_query($link , 'SET NAMES UTF8');
$sql = "select * from a_1_6_pic where a_1_5_m_p_look = 1";
$oo = mysqli_query($link,$sql);
$x0x = mysqli_num_rows($oo);

$now_page = 1;//預設為第1頁
if(!empty($_GET["page"])){ $now_page = $_GET["page"]; }
$page_add = 3;//每頁有幾筆資料

$all_page = ceil($x0x/$page_add);//計算總共有幾頁
$open_page = ($now_page-1) * $page_add ;//計算起始資料位置
$pp = $now_page -1;//計算上一頁的頁碼
$np = $now_page +1;//計算下一頁的頁碼

$sql = "select * from a_1_6_pic where a_1_5_m_p_look = 1 limit $open_page,$page_add";// limit a,b 從第a筆之後(不含它)開始抓數量為b的幾筆資料
$oo = mysqli_query($link,$sql);
$xx = mysqli_fetch_assoc($oo);
?>
<table width="160" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50" align="center" valign="middle">
<?php
if($now_page > 1){
  echo "<a href='?page=".$pp."'><img src='a1.jpg'></a> ";
}
?>
    </td>
  </tr>
<?php
do{
?>
  <tr>
    <td height="105" align="center" valign="middle" bgcolor="#FFCC00"><img src="jnbnbiuer9utw50/<?=$xx["a_1_5_m_p_pic"]?>" width="150" height = "103"></td>
  </tr>
<?php
}while($xx = mysqli_fetch_assoc($oo));

?>
  <tr>
    <td height="50" align="center" valign="middle">
      <?php
if($now_page < $all_page){
  echo " <a href='?page=".$np."'><img src='a2.jpg'></a>";
}      
      ?>
    </td>
  </tr>
</table>