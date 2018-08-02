<?php
  session_start();
  unset($_SESSION['user']);
?>
<script>document.location.href='?do=userLogin'</script>

