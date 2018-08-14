<?php
  include_once 'head.php';
  if(!empty($_GET['vv'])){
    $row=$conn->query("select * from vv where id = '{$_GET['vv']}'")->fetchAll(PDO::FETCH_ASSOC)[0];
    // print_r($row);
  }
?>
  <div id="mm">
    <div class="tab rb" style="width:87%;">
      <div style="background:#FFF; width:100%; color:#333; text-align:left">
        <embed src="imgs/<?=$row['trailer']?>" width="300px" height="250px" controls="" style="float:right;"></embed>
        <font style="font-size:24px"> <img src="imgs/<?=$row['poster']?>" width="200px" height="250px" style="margin:10px; float:left">
        <p style="margin:3px">影片名稱 ：<?=$row['name']?>
          <input type="button" value="線上訂票" onclick="lof(&#39;?do=ord&amp;id=4&#39;)" style="margin-left:50px; padding:2px 4px" class="b2_btu">
        </p>
        <p style="margin:3px">影片分級 ： <img src="assets/03C0<?=$row['lv']?>.png" style="display:inline-block;">限制級 </p>
        <p style="margin:3px">影片片長 ： <?=$row['length']?></p>
        <p style="margin:3px">上映日期： <?=$row['ondate']?></p>
        <p style="margin:3px">發行商 ： <?=$row['supplier']?></p>
        <p style="margin:3px">導演 ： <?=$row['director']?></p>
        <br>
        <br>
        <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<br><?=$row['info']?>
        </p>
        </font>
        <table width="100%" border="0">
          <tbody>
            <tr>
              <td align="center"><input type="button" value="院線片清單" onclick="history.go(-1)"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php
include_once 'footer.php';
?>
