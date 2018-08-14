<?php
  $sql="SELECT * FROM pp where p_look = 1";
  $ro = mysqli_query($link,$sql);
  $rr =  mysqli_fetch_assoc($ro);
  $totle =  mysqli_num_rows($ro);
  $pw = 350;
  if($totle > 4 ){ $pw = ($totle * 85)+10;}
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
}
.pic_list{
  width:35px;
  height:35px;
  background-color:rgb(255,255,255);
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
</style>

      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
          </ul>
          <ul class="controls">
            <input type="button" id="l1">
            <div id="p2">
              <div id="p3">
<?php do{?>
                <div class="pic_list"></div>
<?php }while($rr =  mysqli_fetch_assoc($ro));?>                
              </div>
            </div>
            <input type="button" id="r1">
          </ul>
        </div>
      </div>