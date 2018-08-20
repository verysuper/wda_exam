<?php
	include_once '_config.php';
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
    	<a title="" href="index1.php"><div class="ti" style="background:url('imgs/<?=$title['title']?>'); background-size:cover;"></div><!--標題--></a>
        	<div id="ms">
             	<div id="lf" style="float:left;">
            		<div id="menuput" class="dbor">
                    <!--主選單放此-->
																									<span class="t botli">主選單區</span>
																									<?=$menuStr?>
                                                </div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    	<span class="t">進站總人數 : <?=$total['total']?></span>
                    </div>
        		</div>
<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
                	                     <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
                    	                    <?=$abStr?></marquee>
                    <div style="height:32px; display:block;"></div>
                                        <!--正中央-->
																				<span class="t botli">更多最新消息顯示區</span>
<ul class="ssaa" style="list-style-type:decimal;">
<?php
	// $newsStr="";
	$sql = "SELECT * FROM newss WHERE display=1";
	$newss = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	// for($i=0;$i<5;$i++){
	// 	$newsStr.="<li>".mb_substr($newss[$i]['news'],0,10)."...<div class='all' style='display:none;'>{$newss[$i]['news']}</div></li>";
	// }
	$p=1;
	if(!empty($_GET['p'])){
		$p=$_GET['p'];
	}
	$start=($p-1)*5;
	$end=count($newss);
	for($i=$start;$i<$start+5;$i++){
		if($i<$end){
			?><li><?=mb_substr($newss[$i]['news'],0,30)?>...<div class='all' style='display:none;'><?=$newss[$i]['news']?></div></li><?php
		}
	}
?>
</ul>
                        <div style="text-align:center;">
<?php
	$totalp=ceil($end/5);
	$last=$p-1;
	$next=$p+1;
	?><a class="bl" style="font-size:30px;" href="?p=<?=$last>0?$last:1;?>">&lt;&nbsp;</a><?php
	for($i=1;$i<=$totalp;$i++){
		if($p==$i){
			?><a href="?p=<?=$i?>" style="font-size:40px;"><?=$i?></a><?php
		}else{
			?><a href="?p=<?=$i?>" style="font-size:20px;"><?=$i?></a><?php
		}
	}
?>
    
        <a class="bl" style="font-size:30px;" href="?p=<?=$next<=$totalp?$next:$totalp;?>">&nbsp;&gt;</a>
    </div>
	                </div>
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
                                 <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                	<!--右邊-->   
                	<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="lo('<?=$login_url?>')"><?=$login_text?></button>
                	<div style="width:89%; height:480px;" class="dbor">
											<span class="t botli">校園映象區</span>
											<?=$imgStr?>
						                        <script>
                        	var nowpage=0,num=<?=$imgLen?>;
							function pp(x)
							{
								var s,t;
								if(x==1&&nowpage-1>=0)
								{nowpage--;}
								if(x==2&&(nowpage+3)<num)
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
                	<span class="t" style="line-height:123px;"><?=$bottom['bottom']?></span>
                </div>
    </div>

</body></html>
