<?php
  try{
    $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_3_1;charset=UTF8;","root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
  date_default_timezone_set('Asia/Taipei');
  session_start();

  $mid = "";
  //下拉選單 api
  if(isset($_POST['id']) && $_POST['ddl']=='get_dates'){
    $mid = $_POST['id'];
    $sql="select ondate,datediff(ondate,curdate()) as diff from vv where id='{$_POST['id']}'";
    $row=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC)[0];
    ?><option value="">請選擇日期</option><?php
    for($i=0;$i<3+$row['diff'];$i++){
      if($i<3){
        $show=date("Y-m-d",strtotime($row['ondate']."+{$i} day"));
        // echo $show.",";
        ?><option value="<?=$show?>"><?=$show?></option><?php
      }      
    }
  }
  //下拉選單 api
  if(isset($_POST['date']) && $_POST['ddl']=='get_session'){
    $sql = "select * from morder where mid='{$mid}' and odate='{$_POST['date']}'";
    echo $sql."<br>";
    $row = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    // $chairAll = "";
    // $chairTotal = 0;
    $t[0]=0;$t[1]=0;$t[2]=0;$t[3]=0;$t[4]=0;
    if ($row) {
        foreach ($row as $arr) {
            echo  $arr['osess'].'<br>';
            $arr['osess']=='14:00~16:00'?$t[0]+=$arr['qt']:$t[0];
            $arr['osess']=='16:00~18:00'?$t[1]+=$arr['qt']:$t[1];
            $arr['osess']=='18:00~20:00'?$t[2]+=$arr['qt']:$t[2];
            $arr['osess']=='20:00~22:00'?$t[3]+=$arr['qt']:$t[3];
            $arr['osess']=='22:00~24:00'?$t[4]+=$arr['qt']:$t[4];
        }
    }
    ?><option value="">請選擇場次</option><?php
    for($i=0;$i<5;$i++){
      //if(date('H',time())<$i*2+14) //考試的時候是在白天,所以不用判斷當日這鬼時間
        ?><option value="<?=$i*2+14?>:00~<?=$i*2+16?>:00"><?=$i*2+14?>:00~<?=$i*2+16?>:00 剩餘座位:<?=$t[$i]?></option><?php
    }
  }
?>
