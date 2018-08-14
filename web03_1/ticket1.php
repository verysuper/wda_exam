<?php
  include_once 'head.php';
  $sql="select * from vv where display = 1 and ondate > curdate()-3"; //***** ondate > curdate()-3
  $vvArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  // $vvjson=json_encode($vvArr);
?>
<style>/*<!-- 第一題的素材 -->*/
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
<div id="cover" style="display:none; "><!-- **第一題的素材*** -->
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div><!-- ***** -->
<div id="mm">
  <div class="rb tab" style="width:95%;">
    <form action="" method="post">
    <table width="50%" border="0" align="center">
  <tr>
    <td width=50% align="right">電影:</td>
    <td><select name="movie_name" id="movie_name" onchange="get_dates()">
      <option value="">請選擇電影</option>
      <?php
        foreach($vvArr as $row){
          ?><option value="<?=$row['id']?>"><?=$row['name']?></option><?php
        }
      ?>
    </select></td>
  </tr>
  <tr>
    <td align="right">日期:</td>
    <td><select name="movie_date" id="movie_date" onchange="get_session()">
      <option value="">請選擇日期</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">場次:</td>
    <td><select name="movie_session" id="movie_session">
      <option value="">請選擇場次</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;ticket2.php&#39;)" value="確定"><!-- 第一題的素材 -->
      <!-- <input type="submit" name="button" id="button" value="送出" /> -->
      <input type="reset" name="button2" id="button2" value="重置" /></td>
    </tr>
</table>
</form>
  </div>
</div>
<?php
  include_once 'footer.php';
?>
<script>
  var mid="",mdate="",msess="";
  function get_dates(){
    $('#movie_date').html('');
    mid=$('#movie_name').val();
    $.post('api.php',{'ddl':'get_dates','id':mid},function(aaa){
      $('#movie_date').html(aaa);
    });
  }
  function get_session(){
    $('#movie_session').html('');
    mdate=$('#movie_date').val();
    $.post('api.php',{'ddl':'get_session','mdate':mdate,'mid':mid},function(bbb){
      $('#movie_session').html(bbb);
    });
  }
  //<!-- 第一題的素材 -->
  function op(x,y,url)
  {       
    msess=$('#movie_session').val(); //+++
    var mname=$('#movie_name').find(":selected").text(); //+++***.find(":selected").text()*****
    if(mid=="" || mdate=="" || msess==""){ //+++
      alert('不可為空');
      return false;
    }
    $(x).fadeIn()
    if(y)
    $(y).fadeIn()
    if(y&&url)    
    $(y).load(url+'?mid='+mid+'&mdate='+mdate+'&msess='+msess+'&mname='+mname); //+++ajax的一種
  }
  function cl(x)
  {
    $(x).fadeOut();
  }
</script>
