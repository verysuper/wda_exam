<?php
include_once '0_config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>卓越科技大學校園資訊系統</title>
<link href="assets/css.css" rel="stylesheet" type="text/css">
<script src="assets/jquery-1.9.1.min.js"></script>
<script src="assets/js.js"></script>
</head>

<body>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
<iframe style="display:none;" name="back" id="back"></iframe>
	<div id="main">
<?php
//網頁上方圖片檔案
$sql = "select * from title where display = 1;";
$result = $conn->query($sql);
$row = $result->fetch();
?>
<a href="/wda_exam/web01_2">
<img src="upload/<?=$row['pic']?>" width="1024" height="100" alt="<?=$row['alt']?>" title="<?=$row['alt']?>">
</a>
        	<div id="ms">
             	<div id="lf" style="float:left;">
            		<div id="menuput" class="dbor">
                    <!--主選單放此-->
                    	<span class="t botli">主選單區</span>
                    </div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    	<span class="t">進站總人數 :<?=$total['count']?></span>
                    </div>
        		</div>
                <div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
<!-- 動態文字廣告 -->
<?php
$sql = "select * from ad where display = 1";
$result = $conn->query($sql);
//$row = $result->fetch();
?>
<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo $row['content'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
}
?>
</marquee>
                    <div style="height:32px; display:block;"></div>
                                        <!--正中央-->

<script>
	var lin=new Array();
	var now=0;
<?php 
	$sql="select * from mvim where display='1';";
	$result=$conn->query($sql);
	$curr=0;
	while($row=$result->fetch(PDO::FETCH_ASSOC)){
?>
		lin[<?=$curr?>]="upload/<?=$row['image']?>";
<?php
		$curr++;
	}
?>
	if(lin.length>0)
	{
		setInterval("ww()",3000);		
	}
	function ww()
	{
		$("#mwww").html("<embed loop=true src='"+lin[now]+"' style='width:99%; height:100%;'></embed>")
		//$("#mwww").attr("src",lin[now])
		now++;
		if(now>=lin.length){
			now=0;
		}			
	}
</script>
                	<div style="width:100%; padding:2px; height:290px;">
                    	<div id="mwww" loop="true" style="width:100%; height:100%;">
                        	                                <div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
                                                        </div>
                    </div>
<!-- 最新消息區start -->
<?php
	$sql="select * from news where display = 1";
	$result=$conn->query($sql);
	$num=$result->rowCount();
?>
                	<div style="width:95%; padding:2px; height:190px; margin-top:10px; padding:5px 10px 5px 10px; border:#0C3 dashed 3px; position:relative;">
                    		<span class="t botli">最新消息區　　　　　　　　　　　　　　　　　　　　　　　
<?php echo $num>5?"<a href='news.php'>More...</a>":""; ?>
												</span>
                            <ul class="ssaa" style="list-style-type:decimal;">
<?php
	for($x=1;$x<=5;$x++){
		$row=$result->fetch(PDO::FETCH_ASSOC);
		echo "<li>".mb_substr($row['content'],0,25)."...<div class = 'all' style ='display:none;'>".$row['content']."</div></li>";
	}
?>														
														</ul>
<!-- 最新消息區end -->
        			<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                    	<script>
						$(".ssaa li").hover(
							function ()
							{
								$("#altt").html("<pre>"+$(this).children(".all").html()+"</pre>")
								$("#altt").show()
							}
						)
						$(".ssaa li").mouseout(
							function()
							{
								$("#altt").hide()
							}
						)
                        </script>
                    </div>
                	                </div>
                <div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                    	<script>
						$(".sswww").hover(
							function ()
							{
								$("#alt").html(""+$(this).children(".all").html()+"").css({"top":$(this).offset().top-50})
								$("#alt").show()
							}
						)
						$(".sswww").mouseout(
							function()
							{
								$("#alt").hide()
							}
						)
                        </script>
                                 <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                	<!--右邊-->
<!-- 管理登入按鈕 -->
<?php
if (!empty($_SESSION['acc'])) {
    ?>
<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('0_logout.php')">管理登出</button>

<?php
} else {
    ?><button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('login.php')">管理登入</button>
<?php
}
?>
                	<div style="width:89%; height:480px;" class="dbor">
						<span class="t botli">校園映象區</span>
<!-- 校園映象區 -->
<?php 
	//read
	$sql = "select * from image";
	$result = $conn->query($sql);
	//part page
	$denom = $result->rowCount(); //total rows
	$numer = 3;
	$start_page = 1; // start page
	$current_page = 1;
	if(!empty($_GET['current'])){
		$current_page = $_GET['current'];
	}
	$all_page = ceil($denom / $numer); //total page

	$set_limit = ($current_page - 1) * $numer;
	$sql="select * from image limit $set_limit,$numer";
	$result = $conn->query($sql);
	$last = $current_page - 1;
	$next = $current_page + 1;
?>
<table width='100%'>
	<tr>
		<td align="center">
			<a href='?current=<?php echo $last > 0 ? $last : 1;?>'>
				<img src="images/01E01.jpg" alt="上一頁" title="上一頁">
			</a>
		</td>
	</tr>
<?php while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
	<tr>
		<td align="center">
			<embed src="upload/<?=$row['image']?>" width="150" height="103"  style="border:5px #FC3 solid;"></embed>
		</td>
	</tr>
<?php }?>
	<tr>
		<td align="center">
			<a href='?current=<?php echo $next <= $all_page ? $next : $all_page;?>'>
				<img src="images/01E02.jpg" alt="下一頁" title="下一頁">
			</a>
		</td>
	</tr>
</table>
						<script>
                        	var nowpage=0,num=0;
							function pp(x)
							{
								var s,t;
								if(x==1&&nowpage-1>=0)
								{nowpage--;}
								if(x==2&&(nowpage+1)*3<=num*1+3)
								{nowpage++;}
								$(".im").hide()
								for(s=0;s<=2;s++)
								{
									t=s*1+nowpage*1;
									$("#ssaa"+t).show()
								}
							}
							pp(1)
                        </script>
                    </div>
                </div>
                            </div>
             	<div style="clear:both;"></div>
            	<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
                	<span class="t" style="line-height:123px;"><?=$bottom['content']?></span>
                </div>
    </div>
<script>ww();</script>
</body></html>
