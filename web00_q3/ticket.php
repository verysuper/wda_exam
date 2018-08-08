<?php
  include_once("head.php");
  $no = 0;
  if(!empty($_GET["no"])){
    $no = $_GET["no"];
  }
  $ttt = strtotime("+6hour-3day");
  $td = date("Y-m-d",$ttt);

  $sql = "select * from move where m_look = '1' and m_day > '$td'";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
?>
  <div id="mm">
    <table width="100%" border="1" align="center" cellpadding="3" cellspacing="0">
      <tr>
        <td align="center">
          <select name="s1" id="s1" onchange="select1()">
<?php do{?>
            <option value="<?=$rr["m_seq"]?>"><?=$rr["m_name"]?></option>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
          </select>
        </td>
      </tr>
      <tr>
        <td align="center">
          <div id="ss1"></div>
        </td>
      </tr>
      <tr>
        <td align="center">
          <div id="ss2"></div>
        </td>
      </tr>
      <tr>
        <td align="center"><input type="submit" value="確定"><input type="button" value="重置" onclick="document.location.href='ticket.php?no=<?=$no?>'"></td>
      </tr>
    </table>
<script>
  function select1(){
    s1 = document.getElementById("s1").value;
    $.post("t_1_api.php",{s1},function(dd){
      document.getElementById("ss1").innerHTML = dd;
    });
  }
  function select2(ss){
    s2 = document.getElementById("s2").value;
    alert(s2);
    alert(ss);
/*
    $.post("t_1_api.php",{s1},function(dd){
      document.getElementById("ss1").innerHTML = dd;
    });
*/
  }
</script>
  </div>
<?php include_once("footer.php")?>