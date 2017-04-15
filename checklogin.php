<?php 
session_start();
$conn_string = "host=ec2-23-21-76-49.compute-1.amazonaws.com port=5432 dbname=de3jdei5ioil58 user=uzumoeocrpjdko password=0ce1ed6bd7f4fb708816b4538fb612e79d0f33e2b993353bb8a99b1f51890fb2";
$dbconn4 = pg_connect($conn_string);
//connect to a database named "dcdhmp2hbn5ol8" on the host "ec2-174-129-223-35.compute-1.amazonaws.com" with a username and password
if(!$dbconn4){ 
	echo "Error : Unable to open database\n"; 
}
else{
	echo "hello";
	$email= $_POST['email'];
	echo $password= $_POST['password'];
        echo "<script>alert(1);</script>";
	echo "$email=".$email;
	//convert string to md5
	//$password 	= md5($password);
	echo $shop_url = $_SESSION['shop'];
 print_r($dbconn4);
 echo  $select_store = mysqli_query($dbconn4,"SELECT email,password FROM store_info WHERE store_url = '$shop_url'");
	if (mysqli_num_rows($select_store) > 0) {
		$data = mysqli_fetch_assoc($select_store);
		$_SESSION['email'] = $email;
		echo "cool";
			}
}
	/*$sql = "select email, password from user_table where email = '$email' and password = '$password'";
	$qry = mysql_query($sql);

	$numrows  = mysql_num_rows($qry);
	
	if($numrows > 0){
		//set seesion
		$_SESSION['email'] = $email;
		//print message for jquery
		echo "cool";
	}*/
	

?>
