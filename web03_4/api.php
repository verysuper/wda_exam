<?php
  include_once '_config.php';
  if(isset($_POST['do']) && $_POST['do']=='get_mvDate'){
    $sql="SELECT ondate,datediff(ondate,curdate()) as diff FROM `vv` WHERE id='{$_POST['id']}'";
    $result=$conn->query($sql)->fetch(PDO::FETCH_ASSOC);
    if($result['diff']<0){
      for($i=0;$i<3+$result['diff'];$i++){
        $option=date('Y-m-d',strtotime("+{$i} day"));
        ?><option value="<?=$option?>"><?=$option?></option><?php
      }
    }else{
      for($i=0;$i<3;$i++){
        $option=date('Y-m-d',strtotime($result['ondate']."+{$i} day"));
        ?><option value="<?=$option?>"><?=$option?></option><?php
      }
    }
  }
  if(isset($_POST['do']) && $_POST['do']=='get_mvSess'){//需先建置 ticket dbtable
    $sql="select * from ticket where mid='{$_POST['id']}' and mdate='{$_POST['date']}'";
    $result=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $t=array(0,0,0,0,0);
    if($result){
      foreach($result as $arr){
        $arr['msess']=="14:00~16:00"?$t[0]+=1:$t[0];
        $arr['msess']=="16:00~18:00"?$t[1]+=1:$t[1];
        $arr['msess']=="18:00~20:00"?$t[2]+=1:$t[2];
        $arr['msess']=="20:00~22:00"?$t[3]+=1:$t[3];
        $arr['msess']=="22:00~14:00"?$t[4]+=1:$t[4];
      }
    }
    for($i=0;$i<5;$i++){
      ?><option value="<?=$i*2+14?>:00~<?=$i*2+16?>:00"><?=$i*2+14?>:00~<?=$i*2+16?>:00 剩餘座位<?=20-$t[$i]?></option><?php
    }
  }
?>
