
目前位置：首頁 > 分類網誌 >
<?php
  //p=文章分類,pp=文章id
  if(!empty($_GET['cat'])){
    $cat=$_GET['cat'];
  }else{
    $cat=1;
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
<br>
<p></p>
<fieldset style="float:left;width:15%"><legend>網誌分類</legend>
<a href="?do=po&cat=1">健康新知</a><br>
<a href="?do=po&cat=2">菸害防制</a><br>
<a href="?do=po&cat=3">癌症防治</a><br>
<a href="?do=po&cat=4">慢性病防治</a><br>
</fieldset>
<?php
  if(empty($_GET['art'])){
    $sql="select * from article where category={$cat} and display=1;";
    $result=$conn->query($sql);
?>
    <fieldset style="float:left;width:75%"><legend>文章列表</legend>
<?php
      while($row=$result->fetch(PDO::FETCH_ASSOC)){
        echo "<a href='?do=po&cat={$cat}&art={$row['id']}'>{$row['title']}</a><br>";
      }
?>
    </fieldset>
<?php
  }else{
    $art=$_GET['art'];
    $sql="select * from article where category={$cat} and id={$art};";
    $result=$conn->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);
?>
    <fieldset style="float:left;width:75%"><legend><?=$row['title']?></legend>
      <pre width="65%"><?=$row['content']?></pre>
    </fieldset>
<?php
  }
?>

