<?php
  //$conn=null;
  try{
    $conn = new PDO("mysql:
    host=localhost;
    dbname=wda_exam01;
    charset=UTF8;",
    "root","");
  }catch(PDOException $ex){
    echo $ex->getMessage();
  }
  session_start();
  
  class Admin{
    private $conn;
    public $id;
    public $acc;
    public $type;
    function __construct($db){
      $this->conn=$db;
    }
    function login($acc,$pass){
      echo $acc." && ".$pass."<br>";
      $result = $this->readOne($acc,$pass);
      if($result->rowCount()==0){
        return false;
      }else{
        return true;
      }
    }
    function readOne($acc,$pass){
      $sql="select * from admin where acc='{$acc}' and pass='{$pass}';";
      echo $sql;
      $stmt = $this->conn->query($sql);
      // $stmt = $this->conn->prepare($sql);
      // $stmt->execute();   
      return $stmt;
    }
  }
?>
