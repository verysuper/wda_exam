<?php
  $now_page = 1;
  $page_cnt = 5;
  if(!empty($_GET["page"])){ $now_page = $_GET["page"]; }
  $limit_start = ($now_page - 1 ) * $page_cnt;//計算LIMIT起始數
  $sql = "select * from article where a_look = 1";
  $ro = mysqli_query($link,$sql);
  $data_totle = mysqli_num_rows($ro);//撈出資料總筆數
  $sql = "select * from article where a_look = 1 limit $limit_start,$page_cnt";
  $ro = mysqli_query($link,$sql);
  $rr = mysqli_fetch_assoc($ro);
  $page_totle = ceil($data_totle/$page_cnt);//計算總頁數
  
  $left_arrow ="";
  $right_arrow ="";
  $l_a = $now_page - 1;
  $r_a = $now_page + 1;
  if($now_page != 1){ $left_arrow = "<a href='?do=pop&page=".$l_a."'><</a>";}
  if($now_page < $page_totle){ $right_arrow = "<a href='?do=pop&page=".$r_a."'>></a>";}
?>
  <fieldset id="left_list">
    <legend>目前位置：首頁 > 人氣文章區</legend>
    <table width="90%" border="0" align="center" cellpadding="10" cellspacing="5">
      <tr>
        <td align="center" width="30%">標題</td>
        <td align="center">內容</td>
        <td align="center" width="20%">人氣</td>
      </tr>
<?php
do{
  $ww = "";
  $sql = "select * from new_log where nl_new_seq = '".$rr["a_seq"]."'";
  $ror = mysqli_query($link,$sql);
  $rrr = mysqli_num_rows($ror);
  if(!empty($_SESSION["player"])){
    $sql = "select * from new_log where nl_id = '".$_SESSION["player"]."' and nl_new_seq = '".$rr["a_seq"]."'";
    $rro = mysqli_query($link,$sql);
    $xx = mysqli_num_rows($rro);
    if($xx == 0 ){
      $ww = "- <a href='javascript:good(".$rr["a_seq"].",1)'>讚</a>";
    }else{
      $ww = "- <a href='javascript:good(".$rr["a_seq"].",2)'>回收讚</a>";    
    }
  }
?>
  <tr>
    <td align="left" onclick="document.location.href='?do=news_look&read=<?=$rr["a_seq"]?>'" style="background-color:#f0f0f0;"><?=$rr["a_title"]?></td>
    <td align="left" onclick="document.location.href='?do=news_look&read=<?=$rr["a_seq"]?>'"><?=mb_substr($rr["a_cont"],0,15,"utf-8")?>...</td>
    <td align="center" ><?=$rrr?>個人說<img src="images/02B03.jpg" width="15"><?=$ww?></td>
  </tr>
<?php }while($rr = mysqli_fetch_assoc($ro));?>
      <tr>
        <td colspan="2" align="left">
          <?=$left_arrow?>
<?php
  for($o=1;$o <= $page_totle;$o++){
    if( $now_page == $o){
      echo " <span style='font-size:20px;'>".$o."</span> ";    
    }else{
      echo " ".$o." ";    
    }
  }
?>
          <?=$right_arrow?>
        </td>
      </tr>
    </table>
  </fieldset>
    <script>
    function good(oo,xx){
      $.post("new_good_api.php",{oo,xx},function(){
        document.location.href="?do=pop&read=<?=$now_page?>";
      });
    }
  </script>