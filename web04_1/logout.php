<?php
  session_start();
  if($_GET['type']=='user'){
    unset($_SESSION['user']);
    ?><script>document.location.href='?do=userLogin'</script><?php
  }
  if ($_GET['type'] == 'admin') {
    unset($_SESSION['admin']);
    ?><script>document.location.href='?'</script><?php
}
?>

