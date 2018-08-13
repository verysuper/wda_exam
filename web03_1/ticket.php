<?php
  include_once 'head.php';
  $sql="select * from vv where display = 1 and ondate > curdate()-3"; //***** ondate > curdate()-3
  $vvArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  // echo '<pre>', print_r($vvArr, true), '</pre>';
  $vvjson=json_encode($vvArr);
  // echo $vvjson;
?>
<!-- ***** -->
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl(&#39;#cover&#39;)">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
<!-- ***** -->
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
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="送出" />
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
  // var vvObj=<?=$vvjson?>;
  // var vvObj_len=vvObj.length;
  var mid="";
  var mdate="";
  var msession="";//1~5
  function get_dates(){
    $('#movie_date').html('');
    mid=$('#movie_name').val();
    $.post('api.php',{'ddl':'get_dates','id':mid},function(aaa){
      $('#movie_date').html(aaa);
    });
  }
  function get_session(){
    $('#movie_session').html('');
    var mdate=$('#movie_date').val();
    $.post('api.php',{'ddl':'get_session','date':mdate},function(bbb){
      $('#movie_session').html(bbb);
    });
  }
</script>
