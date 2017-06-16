<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
	
	 $access_key= $_POST['access_key'];
	$shop_url = $_POST['shop_url'];
	if(isset($_REQUEST['access_key']) || $_REQUEST['access_key']!=''){
	 $user_exist = pg_query($dbconn4, "SELECT * FROM user_table WHERE store_url = '{$shop_url}' and  access_key = '{$access_key}'");
		if(pg_num_rows($user_exist)){
			$user_exist = pg_query($dbconn4, "UPDATE user_table SET access_key ='{$access_key}' WHERE store_url = '{$shop_url}'");
				if($user_exist){
					echo "cool";
				}
		}
		else {
			$sql = "insert into user_table (access_key, store_url) values ('$access_key', '$shop_url')";
			$qry = pg_query($sql);
			if($qry){
				echo "cool";
			}
		}
	}
	else{
		$user_exist = pg_query($dbconn4, "SELECT access_key FROM user_table WHERE store_url = '{$shop_url}'");
		if(pg_num_rows($user_exist)){
			echo "cool";
			while($response = pg_fetch_assoc($user_exist)){
					$json = $response['value'];
					echo "api_key=".$json;
				}
		}
	}
?>
