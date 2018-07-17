<?php
$link =mysqli_connect("localhost","root","","db00_q1");
mysqli_query($link , 'SET NAMES UTF8');
$sql = "select * from a_1_9_news where a_1_4_m_look = 1";
$oo = mysqli_query($link,$sql);
$x0x = mysqli_num_rows($oo);
?>
                    		<span class="t botli">更多最新消息顯示區</span>
                            <ul class="sswww" style="list-style-type:decimal;">
<?php
$now_page = 1;
if(!empty($_GET["page2"])){ $now_page = $_GET["page2"]; }
$page_add = 5;

$all_page = ceil($x0x/$page_add);
$open_page = ($now_page-1) * $page_add ;

$sql = "select * from a_1_9_news where a_1_4_m_look = 1 limit $open_page,$page_add";
$oo = mysqli_query($link,$sql);
$xx = mysqli_fetch_assoc($oo);


$data_list = $open_page + 1;
do{
  echo "<div>".$data_list.". ".mb_substr($xx["a_1_4_m_word"],0,10,"utf-8")."...<div class = 'all' style ='display:none;'>".$xx["a_1_4_m_word"]."</div></div>";
  $data_list = $data_list +1;  
}while($xx = mysqli_fetch_assoc($oo));

$pp = $now_page -1;//計算上一頁的頁碼
$np = $now_page +1;//計算下一頁的頁碼

?>
                            </ul>
<div style="text-align:center;">
<?php

if($now_page > 1){
  echo "<a href='?page2=".$pp."' class='bl' style='font-size:30px;'>&lt;&nbsp;</a> ";
}

for($i=1;$i<=$all_page;$i++){
  if($now_page == $i){//當前的頁數取消連結並放大+紅字
    echo "-<ooxx style ='font-size: 30px;color:#f00;'>".$i."</ooxx>-";
  }else{
    echo "-<a href='?page2=".$i."'>".$i."</a>-";  
  }
}
if($now_page < $all_page){
  echo " <a href='?page2=".$np."' class='bl' style='font-size:30px;' >&nbsp;&gt;</a>";
}
?>

</div>