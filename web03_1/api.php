<?php
  try{
    $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_3_1;charset=UTF8;","root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
  date_default_timezone_set('Asia/Taipei');
  session_start();

  //下拉選單2 api
  if(isset($_POST['id']) && $_POST['ddl']=='get_dates'){
    $mid = $_POST['id'];
    $sql="select ondate,datediff(ondate,curdate()) as diff from vv where id='{$_POST['id']}'";
    $row=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC)[0];
    ?><option value="">請選擇日期</option><?php
    if($row['diff']<0){
      for($i=0;$i<3+$row['diff'];$i++){
        $show=date("Y-m-d",strtotime("+{$i} day"));
        ?><option value="<?=$show?>"><?=$show?></option><?php
      }
    }else{
      for($i=0;$i<3;$i++){
        $show=date("Y-m-d",strtotime($row['ondate']."+{$i} day"));
        ?><option value="<?=$show?>"><?=$show?></option><?php
      }
    }
  }
  //下拉選單3 api
  if(isset($_POST['mdate']) && $_POST['ddl']=='get_session'){
    $sql = "select * from morder where mid='{$_POST['mid']}' and mdate='{$_POST['mdate']}'";
    $row = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    $t=array(0,0,0,0,0);
    if ($row) {
      foreach ($row as $arr) {
        $arr['msess']=='14:00~16:00'?$t[0]+=1:$t[0];
        $arr['msess']=='16:00~18:00'?$t[1]+=1:$t[1];
        $arr['msess']=='18:00~20:00'?$t[2]+=1:$t[2];
        $arr['msess']=='20:00~22:00'?$t[3]+=1:$t[3];
        $arr['msess']=='22:00~24:00'?$t[4]+=1:$t[4];
      }
    }
    ?><option value="">請選擇場次</option><?php
    for($i=0;$i<5;$i++){
      //if(date('H',time())<$i*2+14) //考試的時候是在白天,所以不用判斷當日這鬼時間
        ?><option value="<?=$i*2+14?>:00~<?=$i*2+16?>:00"><?=$i*2+14?>:00~<?=$i*2+16?>:00 剩餘座位:<?=20-$t[$i]?></option><?php
    }
  }
?>
