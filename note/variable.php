<?php
  foreach($_POST as $key => $value){    
    $$key = $value;      
  }

  echo '姓名：'.$user;
  echo '年齡：'.$age;
  echo '郵箱：'.$email;
  echo '手機號：'.$cellphone;
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<form action="show.php" method="post">
<input name="user"><br>
<input name="age" ><br>
<input name="email"><br>
<input name="cellphone"><br>
<input type="submit"><br>
</form>
</body>
</html>
