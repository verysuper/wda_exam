<?php
  $link=mysqli_connect("localhost","root","","db00_q3");
  mysqli_query($link,"set names utf8");

  $s1 = $_POST["s1"];
?>
          <select name="s2" id="s2" onchange="select2('<?=$s1?>')">
            <option>請選擇場次</option>
            <option value="1">14:00~16:00</option>
            <option value="2">16:00~18:00</option>
            <option value="3">18:00~20:00</option>
            <option value="4">20:00~22:00</option>
            <option value="5">22:00~24:00</option>
          </select>