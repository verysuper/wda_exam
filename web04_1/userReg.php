<?php
  if(!empty($_POST['acc'])){
    //再檢查一次
    $sql="select * from user where acc='{$_POST['acc']}' limit 1";
    $result=$conn->query($sql)->rowCount();
    if($result<1 && strtolower($_POST['acc'])!='admin'){
      foreach($_POST as $key => $value){    
        $$key = $value;      
      }    
      $sql="insert into user values(null,'{$acc}','{$pw}','{$name}','{$tel}','{$address}','{$mail}','{$now}');";
      $result=$conn->query($sql);
      ?><script>
        alert('註冊成功');
        document.location.href="?do=userLogin";
      </script><?php
    }else{
      ?><script>alert('帳號已重複');</script><?php
    }
  }
?>
<form action="" method="post">
<table width="80%" border="0" align="center">
<caption><h1>會員註冊</h1></caption>
  <tr>
    <td class="tt ct">姓名</td>
    <td class="pp"><input type="text" name="name" required></td>
  </tr>
  <tr>
    <td class="tt ct">帳號</td>
    <td class="pp">
      <input type="text" name="acc" id="userAcc" required>
      <input type="button" name="" value="檢測帳號" onclick='userAccCheck()'>
    </td>
  </tr>
  <tr>
    <td class="tt ct">密碼</td>
    <td class="pp"><input type="text" name="pw" required></td>
  </tr>
  <tr>
    <td class="tt ct">電話</td>
    <td class="pp"><input type="text" name="tel" required></td>
  </tr>
  <tr>
    <td class="tt ct">住址</td>
    <td class="pp"><input type="text" name="address" required></td>
  </tr>
  <tr>
    <td class="tt ct">電子信箱</td>
    <td class="pp"><input type="text" name="mail" required></td>
  </tr>
  <tr>
    <td colspan="2" align='center'>
      <input name="註冊" type="submit" />
      <input name="重置" type="reset" />
    </td>
  </tr>
</table>
</form>
<script>
  function userAccCheck(){
    var userAcc=document.getElementById('userAcc').value;
    if(userAcc==''){
      alert("帳號不可為空");
      return;
    }
    if(userAcc.toLowerCase()!='admin'){
      $.post('api.php',{to:'userAccCheck', userAcc},function(result){
        if(result<1){
          alert('帳號可以使用');
        }else{
          document.getElementById('userAcc').value=''; //************** */
          alert('帳號已重複');
        }
      })
    }else{
      document.getElementById('userAcc').value=''; //************** */
      alert("不得使用「 admin 」作為帳號註冊");
    }
  }
</script>
