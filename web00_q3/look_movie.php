<?php
  include_once("head.php");
  $no = $_GET["no"];
  $sql = "select * from move where m_seq = '".$no."'";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
?>
  <div id="mm">
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <video src="avi/<?=$rr["m_u"]?>" width="300px" height="250px" controls="" style="float:right;"></video>
        <font style="font-size:24px"> <img src="Profile page_files/03B20.png" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$rr["m_name"]?>
          <input type="button" value="線上訂票" onclick="document.location.href='ticket.php?no=<?=$rr["m_seq"]?>'" style="margin-left:50px; padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ： <img src="images/<?=$rr["m_lv"]?>.png"> </p>
        <p style="margin:3px">影片片長 ： <?=$rr["m_time"]?></p>
        <p style="margin:3px">上映日期 <?=$rr["m_day"]?></p>
        <p style="margin:3px">發行商 ： <?=$rr["m_fa"]?></p>
        <p style="margin:3px">導演 ： <?=$rr["m_d"]?></p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br>
          <?=nl2br($rr["m_con"])?>
        </p>
        </font>
      </div>
    </div>
  </div>
<?php include_once("footer.php")?>