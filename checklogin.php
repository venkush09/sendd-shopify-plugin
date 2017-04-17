<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
	
	$email= $_POST['email'];
	echo $password= $_POST['password'];
      echo "$email=".$email;
	//convert string to md5
	//$password 	= md5($password);
	echo $shop_url = $_SESSION['shop'];
		echo "hello";
$shop_exists = pg_query($dbconn4, "SELECT * FROM user_table1");
if(pg_num_rows($shop_exists) < 1){
	echo "exist";
}
$query = "SELECT * FROM user_table1";
echo $query;
$a = pg_query($dbconn4, $query);

if (mysqli_num_rows($a) > 0) {
$data = mysqli_fetch_assoc($a);
 echo $email= $data['email'];
 echo $shop_url = $data['store_url'];
}
/* $select_store = mysqli_query($dbconn4,"SELECT email,password FROM user_table WHERE store_url = '$shop_url' and email = '$email' and password = '$password'");
print_r($select_store);
	if (mysqli_num_rows($select_store) > 0) {
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
