<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
	
	 $access_key= $_POST['access_key'];
	 $shop_url = $_POST['shop_url'];
	if(isset($_REQUEST['access_key']) || $_REQUEST['access_key']!=''){

	$user_exist = pg_query($dbconn4, "UPDATE user_table SET status = '1' WHERE store_url = '{$shop_url}' and  access_key = '{$access_key}'");
	 print_r($user_exist);
	
	
	}
?>
