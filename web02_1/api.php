<?php
  include_once '_config.php';
	// 如果要做的事是good
	if($_GET["do"]== "good")
	{
		// 收回讚
		if($_GET["type"] == "2")
		{
			$result = $conn->query("update article set ilike = ilike -1 where id = '".$_POST["id"]."'");
			$result = $conn->query("delete from ilike where u_id = '".$_POST["user"]."' and a_id = '".$_POST["id"]."'");
		}
		// 讚
		else
		{
			$result = $conn->query("update article set ilike = ilike +1 where id = '".$_POST["id"]."'");
			$result = $conn->query("insert into ilike values (null, '".$_POST["user"]."', '".$_POST["id"]."')");
		}
	}
?>
