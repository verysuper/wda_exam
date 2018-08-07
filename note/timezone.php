<?php
  //date_default_timezone_set('Asia/Taipei');
  //date('Y/m/d H:i:s',time());
?>

<script>
function ShowTime(){
　document.getElementById('showbox').innerHTML = new Date();
　setTimeout('ShowTime()',1000);
}
</script>
<body onload='ShowTime()'>
  <h1 id='showbox'></h1>
</body>
