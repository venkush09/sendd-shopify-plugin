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
		$user_exist = pg_query($dbconn4, "SELECT * FROM user_table WHERE store_url = '{$shop_url}'");
		if(pg_num_rows($user_exist)){
			
			while ($row = pg_fetch_assoc($user_exist)) {
					 echo $row['access_key'];
				}
		}
	}

        	
		if(isset($_REQUEST['saveaddress']) || $_REQUEST['saveaddress']!=''){

			$address_id=$_REQUEST['saveaddress'];
			 $name=$_REQUEST['name'];
			 $address_line1=$_REQUEST['address_line1'];
			 $address_line2=$_REQUEST['address_line2'];
			 $city=$_REQUEST['city'];
			 $zipcode=$_REQUEST['zipcode'];
			 $phoneno=$_REQUEST['phoneno'];
			 $shop_url=$_REQUEST['shop_url'];
			echo $pickup_address = pg_query($dbconn4, "SELECT * FROM pickup_address WHERE shop_url = '{$shop_url}' and id={$address_id}");
			if(pg_num_rows($pickup_address)){
				 pg_query($dbconn4, "UPDATE pickup_address SET name ='{$name}' , address_line1='{$address_line1}', address_line2='{$address_line2}', city='{$city}', zipcode='{$zipcode}', phoneno='{$phoneno}' WHERE shop_url = '{$shop_url}' and id='{$address_id}'");
			echo "Address update  sucessfully";
			}
			else{
			 $sql = "insert into pickup_address (name,address_line1,address_line2,city ,zipcode,phoneno,shop_url) values ('$name', '$address_line1','$address_line2','$city', '$zipcode','$phoneno','$shop_url' )";
				$qry = pg_query($sql);	
				echo "Address save sucessfully";
			}
		}
?>
