<?php
include_once("head.php");
$sql="update item_3 set i3_look = 0 where i3_seq = '".$_GET['no']."'";
mysqli_query($link,$sql);
?>
<script>
  document.location.href="admin.php?do=admin&redo=admin_item";
</script>