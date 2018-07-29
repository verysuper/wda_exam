<?php
class wfCart {
	var $total = 0;
	var $itemcount = 0;
	var $items = array();
  var $itemprices = array();
	var $itemqtys = array();
  var $iteminfo = array();
  function cart() {} // constructor function
    
	function get_contents(){ // gets cart contents
		$items = array();
		foreach($this->items as $tmp_item){
		  $item = FALSE;
			$item['id'] = $tmp_item;
      $item['qty'] = $this->itemqtys[$tmp_item];
			$item['price'] = $this->itemprices[$tmp_item];
			$item['info'] = $this->iteminfo[$tmp_item];
			$item['subtotal'] = $item['qty'] * $item['price'];
      $items[] = $item;
		}
		return $items;
  } // end of get_contents
  
  function add_item($itemid,$qty=1,$price = FALSE, $info = FALSE){ // adds an item to cart
    if(!$price){
		  $price = wf_get_price($itemid,$qty);
		}
    if(!$info){
      $info = wf_get_info($itemid);
    }
		if($this->itemqtys[$itemid] > 0){ 
			$this->itemqtys[$itemid] = $qty + $this->itemqtys[$itemid];
			$this->_update_total();
		} else {
			$this->items[]=$itemid;
			$this->itemqtys[$itemid] = $qty;
			$this->itemprices[$itemid] = $price;
			$this->iteminfo[$itemid] = $info;
		}
		$this->_update_total();
  } // end of add_item
  
  // changes an items quantity
	function edit_item($itemid,$qty){
		if($qty < 1) {
			$this->del_item($itemid);
		} else {
			$this->itemqtys[$itemid] = $qty;
			// uncomment this line if using 
			// the wf_get_price function
			// $this->itemprices[$itemid] = wf_get_price($itemid,$qty);
		}
		$this->_update_total();
  } // end of edit_item
  
	function del_item($itemid){ // removes an item from cart
		$ti = array();
		$this->itemqtys[$itemid] = 0;
		foreach($this->items as $item){
			if($item != $itemid){
				$ti[] = $item;
			}
		}
		$this->items = $ti;
		$this->_update_total();
  } //end of del_item
  
  function empty_cart(){ // empties / resets the cart
    $this->total = 0;
    $this->itemcount = 0;
    $this->items = array();
    $this->itemprices = array();
    $this->itemqtys = array();
    $this->iteminfo = array();
  } // end of empty cart
  
	function _update_total(){ // internal function to update the total in the cart
    $this->itemcount = 0;
    $this->total = 0;
    if(sizeof($this->items > 0)){
      foreach($this->items as $item) {
        $this->total = $this->total + ($this->itemprices[$item] * $this->itemqtys[$item]);
        $this->itemcount++;
			}
		}
	} // end of update_total
}
?>
