目前位置：首頁 > 分類網誌 >
<?php
  $cat=1;
  if(!empty($_GET['cat'])){
    $cat=$_GET['cat'];
  }
  switch($cat){
    case 1:
      echo '健康新知';
      break;
    case 2:
      echo '菸害防制';
      break;
    case 3:
      echo '癌症防治';
      break;
    case 4:
      echo '慢性病防治';
      break;
  }
?>
<table width="100%" border="0">
  <tr>
    <td width="12%" valign="top">
   	  <p>網誌分類</p>
    	<a href="?do=po&cat=1">健康新知</a><br>
    	<a href="?do=po&cat=2">菸害防制</a><br>
    	<a href="?do=po&cat=3">癌症防治</a><br>
    	<a href="?do=po&cat=4">慢性病防治</a><br>
    </td>
    <td width="88%" valign="top">
      <?php
        if(empty($_GET['art'])){
          ?><p>文章列表</p><?php
            $sql = "SELECT * FROM article WHERE cat='{$cat}' and display='1'";
            $result = $conn->query($sql);
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                ?><a href="?do=po&cat=<?=$cat?>&art=<?=$row['id']?>"><?=$row['name']?></a><br><?php
            }
        }else{
          $sql = "SELECT * FROM article WHERE cat='{$cat}' and id='{$_GET['art']}' and display='1'";
          $result = $conn->query($sql);
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              ?><?=$row['content']?><?php
          }
        }
      ?>
    </td>
  </tr>
</table>
