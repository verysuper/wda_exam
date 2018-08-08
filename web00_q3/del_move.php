<?php
include("head.php");
$no = $_GET["no"];
$sql = "delete from move where m_seq = '".$no."'";
mysqli_query($link,$sql);
?>
<script>
  document.location.href="admin.php?do=admin&redo=vvv";
</script>