<?php
  include_once 'head.php';
  $sql="select * from vv where display = 1 and ondate > curdate()-3"; //***** ondate > curdate()-3
  $vvArr=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  // echo '<pre>', print_r($vvArr, true), '</pre>';
  $vvjson=json_encode($vvArr);
  echo $vvjson;
?>
<div id="mm">
  <div class="rb tab" style="width:95%;">
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
    <td><select name="movie_date" id="movie_date">
      <option value="">請選擇日期</option>
    </select></td>
  </tr>
  <tr>
    <td align="right">場次:</td>
    <td><select name="select3" id="select3">
      <option value="">請選擇場次</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="button" id="button" value="送出" />
      <input type="reset" name="button2" id="button2" value="重設" /></td>
    </tr>
</table>

  </div>
</div>
<?php
  include_once 'footer.php';
?>
<script>
  var vvObj=<?=$vvjson?>;
  var vvObj_len=vvObj.length;
  function get_dates(){
    var mid=$('#movie_name').val();
    var mdate='';    
    for(var i=0;i<vvObj_len;i++){
      if(vvObj[i]['id']==mid){
        mdate=vvObj[i]['ondate'];
        break;
      }
    }
    
    var now= new Date('YYYY-MM-DD');
    alert(now);
  }
</script>
