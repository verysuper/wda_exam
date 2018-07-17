<?php
  $sql ="select * from a_1_12_1 where a_1_12_1_look = 1";
  $m1 = mysqli_query($link,$sql);
  $mu1 =  mysqli_fetch_assoc($m1);
  do{
?>
<a href="<?=$mu1["a_1_12_1_url"]?>"><div class="mainmu" onmouseover="xx('g<?=$mu1["a_1_12_1_seq"]?>');"><?=$mu1["a_1_12_1_name"]?></div></a>
  <div id="g<?=$mu1["a_1_12_1_seq"]?>" class = "ccc">
<?php
    $sql ="select * from a_1_12_2 where a_1_12_2_a_1_12_1 = '".$mu1["a_1_12_1_seq"]."'";
    $m2 = mysqli_query($link,$sql);
    $mu2 =  mysqli_fetch_assoc($m2);
    $mu2_list =  mysqli_num_rows($m2);
    if($mu2_list > 0){
      do{
?>
        <a href="<?=$mu2["a_1_12_2_url"]?>">
          <div class="mainmu2"><?=$mu2["a_1_12_2_name"]?></div>
        </a>
<?php
      }while($mu2 =  mysqli_fetch_assoc($m2));
    }
?>
  </div>
<?php
  }while($mu1 =  mysqli_fetch_assoc($m1));
?>
<script>
  function xx(oo){
    close_ccc();
    //document.getElementById(oo).style.display="block";  //JS
    $("#"+oo).show();  //JQ
  }
  function close_ccc(){
    $(".ccc").hide();
  }
  close_ccc();
</script>