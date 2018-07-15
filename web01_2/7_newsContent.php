<?php
	$sql="select * from news where display = 1";
	$result=$conn->query($sql);
  //part page
	$denom = $result->rowCount(); //total rows
	$numer = 5;
	$start_page = 1; // start page
	$news_page = 1;
	if(!empty($_GET['news_p'])){
		$news_page = $_GET['news_p'];
	}
	$all_page = ceil($denom / $numer); //total page

	$set_limit = ($news_page - 1) * $numer;
	$sql="select * from news limit $set_limit,$numer";
	$result = $conn->query($sql);
	$last = $news_page - 1;
	$next = $news_page + 1;
?>
<style type="text/css">
a {
	text-decoration: none;
}
.current_page{
  font-size: 38px;
}
</style>
                    		<span class="t botli">更多最新消息顯示區</span>
                            <ul class="ssaa" style="list-style-type:decimal;">
<?php
	// for($x=1;$x<=$denom;$x++){
	// 	$row=$result->fetch(PDO::FETCH_ASSOC);
	// 	echo "<li>".mb_substr($row['content'],0,25)."...<div class = 'all' style ='display:none;'>".$row['content']."</div></li>";
  // }
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    echo "<li>".mb_substr($row['content'],0,25)."...<div class = 'all' style ='display:none;'>".$row['content']."</div></li>";
  }
?>														
														</ul>
                        <div style="text-align:center;">
    <a class="bl" style="font-size:30px;" href="?do=meg&news_p=<?=($last > 0 ? $last : 1)?>">&lt;&nbsp;</a>
<?php 
    for($x=1;$x<=$all_page;$x++){
?> 
        <a href='?do=meg&news_p=<?=$x?>' <?php if($news_page == $x){echo "class=current_page";}?>><?=$x?></a>
<?php 
    }
?>
        <a class="bl" style="font-size:30px;" href="?do=meg&news_p=<?=($next <= $all_page ? $next : $all_page)?>">&nbsp;&gt;</a>
    </div>
