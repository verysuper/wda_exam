<?php
include_once("head.php");
$sql="delete from item_3 where i3_seq = '".$_GET['no']."'";
mysqli_query($link,$sql);
?>
<script>
  document.location.href="admin.php?do=admin&redo=admin_item";
</script>