<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
	
	 $email= $_POST['email'];
	 $password= $_POST['password'];
    	$shop_url = $_POST['shop_url'];
		
		if(isset($_REQUEST['login']) || $_REQUEST['login']!=''){
 echo $email_id=$_REQUEST['email'];
  echo $password=$_REQUEST['password'];
  $ch = curl_init();


curl_setopt($ch, CURLOPT_URL, "https://api-staging.sendd.co/rest-auth/login/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"email\": \"hello@creativecases.in\",
  \"password\": \"hello@creativecases.in\"
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));

echo $response = curl_exec($ch);
curl_close($ch);

//var_dump($response);
}
	//convert string to md5
	//$password 	= md5($password);
	//$shop_url = $_SESSION['shop'];
	/* $user_exist = pg_query($dbconn4, "SELECT * FROM user_table WHERE store_url = '{$shop_url}' and  email = '{$email}' and password = '{$password}'");
	
if(pg_num_rows($user_exist)){
while($response = pg_fetch_assoc($user_exist)){
$_SESSION['email'] =  $email;
	echo "cool";
	pg_query($dbconn4, "UPDATE user_table SET status = '1' WHERE store_url = '{$shop_url}' and  email = '{$email}' and password = '{$password}'");

} 
}*/
?>
