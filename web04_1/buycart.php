<?php
  if(!isset($_SESSION['user'])){
    ?><script>document.location.href="?do=userLogin";</script><?php
  }else{
    if(empty($_GET['i'])){
      echo '<h1>未選任何商品</h1>';
    }else{
      echo '<h1>網頁還在做</h1>';
    }
  }
?>
