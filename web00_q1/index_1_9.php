<?php
$link =mysqli_connect("localhost","root","","db00_q1");
mysqli_query($link , 'SET NAMES UTF8');
$sql = "select * from a_1_9_news";
$oo = mysqli_query($link,$sql);
$x0x = mysqli_num_rows($oo);

$now_page = 1;
//if(!empty($_GET["page"])){ $now_page = $_GET["page"]; }
$page_add = 5;

$all_page = ceil($x0x/$page_add);
$open_page = ($now_page-1) * $page_add ;

$sql = "select * from a_1_9_news limit $open_page,$page_add";
$oo = mysqli_query($link,$sql);
$xx = mysqli_fetch_assoc($oo);

do{
  echo "<li>".mb_substr($xx["a_1_4_m_word"],0,10,"utf-8")."...<div class = 'all' style ='display:none;'>".$xx["a_1_4_m_word"]."</div></li>";
}while($xx = mysqli_fetch_assoc($oo));

/*
echo "全部有".$x0x."筆資料<br>";
echo "這是第".$now_page."頁<br>";
echo "全部有".$all_page."頁<br>";

$pp = $now_page -1;//計算上一頁的頁碼
$np = $now_page +1;//計算下一頁的頁碼

if($now_page > 1){
  echo "<a href='?page=".$pp."'>＜</a> ";
}

for($i=1;$i<=$all_page;$i++){
  if($now_page == $i){//當前的頁數取消連結並放大+紅字
    echo "-<ooxx style ='font-size: 60px;color:#f00;'>".$i."</ooxx>-";
  }else{
    echo "-<a href='?page=".$i."'>".$i."</a>-";  
  }
}
if($now_page < $all_page){
  echo " <a href='?page=".$np."'>＞</a>";
}
*/
?>
