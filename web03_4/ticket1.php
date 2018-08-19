<?php
  include_once '_config.php';
  $sql="select * from vv where display=1 and ondate > curdate()-3";
  $vvArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  $mid="";
  if(!empty($_GET['id'])){
    $mid=$_GET['id'];
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0047)? -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="css/css.css">
<link href="css/s2.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery-1.9.1.min.js"></script>
</head>

<body>
<style>
#coverr
{
	width:70%;
	min-width:300px;
	max-width:800px;
	height:70%;
	min-height:300px;
	position:absolute;
	z-index:5;
	background:#ffffff;
	top:0px;
	left:0px;
	right:0px;
	bottom:0px;
	margin:auto;
	overflow:auto;
}
</style>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
<div id="main">
  <div id="top" class="ct" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>
  <div id="top2"> <a href="index1.php">首頁</a> <a href="ticket1.php">線上訂票</a> <a href="#">會員系統</a> <a href="admin.php">管理系統</a> </div>
  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>
  <div id="mm"><!-- 下拉選單區 start -->
<form action="" method="post">    <table width="30%" border="0" align="center">
  <tr>
    <td align="center">電影:
      <select id="mvName" onchange="get_mvDate()">
        <option value=''>請選擇電影</option>
        <?php
          for($i=0;$i<count($vvArr);$i++){
            ?><option value="<?=$vvArr[$i]['id']?>" <?php if($mid == $vvArr[$i]['id']){echo "selected";}?>><?=$vvArr[$i]['name']?></option><?php
          }
        ?>
      </select></td>
    </tr>
  <tr>
    <td align="center">日期:
      <select id="mvDate" onchange="get_mvSess()">
        <option value=''>請選擇日期</option>
      </select></td>
    </tr>
  <tr>
    <td align="center">場次:
      <select id="mvSess">
        <option value=''>請選擇場次</option>
      </select></td>
    </tr>
  <tr>
    <td align="center">
      <input type="button" value="確定" onclick="op('#cover','#cvr','ticket2.php')"/>
      <input type="reset" name="button2" id="button2" value="重置" /></td>
    </tr>
</table></form>
  </div><!-- 下拉選單區 end -->
  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>
</div>
</body>
</html>
<script>  
  var mvId="",mvDate="",mvSess="",mvName="";
  function get_mvDate(){
    $('#mvDate').html("<option value=''>請選擇日期</option>");
    $('#mvSess').html("<option value=''>請選擇場次</option>");
    mvId=$('#mvName').val();
    if(mvId!=''){
      $.post('api.php',{'do':'get_mvDate','id':mvId},function(aa){
        $('#mvDate').append(aa);
      });
    }
  }
  get_mvDate();//*************************網頁載入時執行一次 */
  function get_mvSess(){
    $('#mvSess').html("<option value=''>請選擇場次</option>");
    mvDate=$('#mvDate').val();
    if(mvDate!=''){
      $.post('api.php',{'do':'get_mvSess','date':mvDate,'id':mvId},function(bb){
        $('#mvSess').append(bb);
      });
    }
  }
  function op(x,y,url)
  {
    mvSess=$('#mvSess').val();
    mvName=$('#mvName').find(':selected').text();
    if(mvSess==""){
      alert("場次不可為空");
      return false;
    }
    $(x).fadeIn()
    if(y)
    $(y).fadeIn()
    if(y&&url)
    $(y).load(url+"?mid="+mvId+"&mname="+mvName+"&mdate="+mvDate+"&msess="+mvSess)
  }
  function cl(x)
  {
    $(x).fadeOut();
  }
</script>
