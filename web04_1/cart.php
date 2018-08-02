<?php
class Cart{
  //var $total = 0;//小計
  //var $itemcount=0;//將購買總數量
  var $items = array();//id
  var $item_qty = array();//購買的數量
  
  function __construct(){}//建構子
  
    function get_contents(){
    $items=array();
    foreach($this->items as $id){
      $item=null;
      $item['id']=$id;
      $item['qty'] = $this->item_qty[$id];
      $items[]=$item;
    }
    return $items;
  }
  
  function add_item($_id,$_qty){
    $this->items[]=$_id;
    $this->item_qty[$_id]=$_qty;
  }
}
?>
