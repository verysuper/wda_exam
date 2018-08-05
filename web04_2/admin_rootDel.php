<?php
if(isset($_GET['id'])){
  $sql="DELETE FROM admin WHERE id='{$_GET['id']}'";
  $conn->query($sql);
  header('location:admin.php?redo=admin_root');
}
?>
