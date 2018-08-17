<?php
  $sql="SELECT * FROM pp where p_look = 1 order by p_desc desc";
  $ro = mysqli_query($link,$sql);
  $rr =  mysqli_fetch_assoc($ro);
  $totle =  mysqli_num_rows($ro);
  $totle_page = $totle -3;
  $pw = 350;
  if($totle > 4 ){ $pw = ($totle * 85)+10;}
  
  $ppsql="SELECT * FROM pp where p_look = 1 order by p_desc desc";
  $ppro = mysqli_query($link,$ppsql);
  $pprr =  mysqli_fetch_assoc($ppro);

  $rsql="select * from look_pic";
  $rro = mysqli_query($link,$rsql);
  $rrr = mysqli_fetch_assoc($rro);
?>

<style>
#p2{
  width:340px;
  height:35px;
  margin:0 auto;
  display:inline-block;
  overflow:hidden;
}
#p3{
  width:<?=$pw?>px;
  height:35px;
  position:relative;
}
.pic_list{
  width:35px;
  height:35px;
  background-size:100%;
  background-position:center center;
  display:inline-block;
  margin: 0 24px;
}
#l1{
  min-width: 35px;
  min-height: 35px;
  background-image:url(images/left.png);
  background-color:rgba(0,0,0,0);
  display:inline-block;
}
#r1{
  min-width: 35px;
  min-height: 35px;
  background-image:url(images/right.png);
  background-color:rgba(0,0,0,0);
  display:inline-block;
}
#pname{
  width:420px;
  height:20px;
  text-align: center;
}
#ppic{
  width:420px;
  height:340px;
  background-size:307px 340px;
  background-position:center center;
  background-repeat:no-repeat;
  display:none;
}
</style>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
<div id="pname"></div>
<div id="ppic"></div>
          </ul>
          <ul class="controls">
            <input type="button" id="l1" onclick="ll()">
            <div id="p2">
              <div id="p3">
<?php
  $pm =0;
do{
$pm = $pm+1;
?>
                <a href="JavaScript:look_pic('pimg/<?=$rr["p_pic"]?>','<?=$rr["p_name"]?>');"><div id = "p_m_<?=$pm?>" class="pic_list" style="background-image:url(pimg/<?=$rr["p_pic"]?>)"></div></a>
<?php }while($rr =  mysqli_fetch_assoc($ro));?>                
              </div>
            </div>
            <input type="button" id="r1" onclick="rr()">
          </ul>
        </div>
      </div>
<script>
  var pic_time = 0;
  var xx_pic_name = new Array(<?=$totle?>);
  var xx_pic_pic = new Array(<?=$totle?>);
<?php
  $pn =0;
do{
?>
  xx_pic_name[<?=$pn?>] = "<?=$pprr["p_name"]?>";
  xx_pic_pic[<?=$pn?>] = "pimg/<?=$pprr["p_pic"]?>";
<?php
  $pn = $pn + 1;
}while($pprr =  mysqli_fetch_assoc($ppro));

?>
  function chang_time(){

    look_pic(xx_pic_pic[pic_time],xx_pic_name[pic_time]);
    pic_time = pic_time + 1;
    if(pic_time >= <?=$totle?>){ pic_time =1;}
    setTimeout(function(){chang_time()},3000);
  }

  chang_time();
  
  function look_pic(now_pic,now_name){
    document.getElementById("pname").innerHTML = now_name;
    cj04<?=$rrr["l_p_look"]?>(now_pic);
  }
  function cj041(now_pic){
    document.getElementById("ppic").style.display = "none";
    document.getElementById("ppic").style.backgroundImage = "url(" + now_pic + ")";
    $("#ppic").fadeToggle(1000);
  }
  function cj042(now_pic){
    document.getElementById("ppic").style.display = "none";
    document.getElementById("ppic").style.backgroundImage = "url(" + now_pic + ")";
    $("#ppic").slideToggle(1000);
  }
  function cj043(now_pic){
    document.getElementById("ppic").style = "width:0px;height:0px;";
    document.getElementById("ppic").style.display = "block";
    document.getElementById("ppic").style.backgroundImage = "url(" + now_pic + ")";
    $("#ppic").animate({
      width:'420px',
      height:'340px'
    },1000);
  }
  var p3_left = 1;
  function ll(){
    p3_left = p3_left - 1;
    if( p3_left < 1){ p3_left = 1;}
    gogo();
  }
  function rr(){
    p3_left = p3_left +1;
    if( p3_left > <?=$totle_page?>){ p3_left = <?=$totle_page?>;}
    gogo();
  }
  function gogo(){
    now_left = (p3_left - 1) * 83;
    $("#p3").animate({left:"-" + now_left + "px"},300);
  }
</script>