<?php
  try{
    $conn=new PDO("mysql:host=127.0.0.1;dbname=wda_3_1;charset=UTF8;","root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
  date_default_timezone_set('Asia/Taipei');
  session_start();

  //下拉選單 api
  if(isset($_POST['id']) && $_POST['ddl']=='get_dates'){
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
    ?><option value="">請選擇場次</option><?php
    for($i=0;$i<5;$i++){
      //if(date('H',time())<$i*2+14) //考試的時候是在白天,所以不用判斷當日這鬼時間
        ?><option value="<?=$i*2+14?>:00~<?=$i*2+16?>:00"><?=$i*2+14?>:00~<?=$i*2+16?>:00 剩餘座位:xx</option><?php
    }
  }
?>
