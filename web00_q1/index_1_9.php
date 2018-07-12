<?php
$link =mysqli_connect("localhost","root","","db00_q1");
mysqli_query($link , 'SET NAMES UTF8');
$sql = "select * from a_1_9_news where a_1_4_m_look = 1";
$oo = mysqli_query($link,$sql);
$x0x = mysqli_num_rows($oo);
?>
                    		<span class="t botli">最新消息區　　　　　　　　　　　　　　　　　　　　　　　<?php if($x0x > 5){?><a href="news_list.php">More...</a><?php }?></span>
                            <ul class="ssaa" style="list-style-type:decimal;">
<?php
$sql = "select * from a_1_9_news where a_1_4_m_look = 1 limit 5";
$oo = mysqli_query($link,$sql);
$xx = mysqli_fetch_assoc($oo);

do{
  echo "<li>".mb_substr($xx["a_1_4_m_word"],0,10,"utf-8")."...<div class = 'all' style ='display:none;'>".$xx["a_1_4_m_word"]."</div></li>";
}while($xx = mysqli_fetch_assoc($oo));

?>
                            </ul>