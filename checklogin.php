<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
	
	$email= $_POST['email'];
	echo $password= $_POST['password'];
      echo "$email=".$email;
	//convert string to md5
	//$password 	= md5($password);
	echo $shop_url = $_SESSION['shop'];
		echo "hello123";
$shop_exists = pg_query($dbconn4, "SELECT * FROM user_table1");

$lastID = pg_fetch_assoc($shop_exists);

if(pg_num_rows($shop_exists)){
				while($response = pg_fetch_assoc($shop_exists)){
					$json = $response['value'];
					if(!empty($json)){
						echo "{$response['key']}:: <pre>";
						print_R($json);
						echo "</pre>";
					}
				}
			}
/* $select_store = pg_query($dbconn4,"SELECT email,password FROM user_table WHERE store_url = '$shop_url' and email = '$email' and password = '$password'");
print_r($select_store);
	if (pg_num_rows($select_store) > 0) {
		$data = mysqli_fetch_assoc($select_store);
		$_SESSION['email'] = $email;
		echo "cool";
			}*/
 $select_store2 = mysqli_query($dbconn4,"SELECT * FROM user_table");
print_r( $select_store2);
	/*$sql = "select email, password from user_table where email = '$email' and password = '$password'";
	$qry = mysql_query($sql);

	$numrows  = mysql_num_rows($qry);
	
	if($numrows > 0){
		
		//set seesion
		echo $_SESSION['email'] = $email;
		//print message for jquery
		echo "cool";
	}*/
	

?>
