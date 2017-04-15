<?php 
session_start();

	
	$email= $_POST['email'];
	echo $password= $_POST['password'];
        echo "<script>alert(1);</script>";
	echo "$email=".$email;
	//convert string to md5
	//$password 	= md5($password);
	echo $shop_url = $_SESSION['shop'];
		echo "hello";
	 print_r($dbconn4);
 echo  $select_store = mysqli_query($dbconn4,"SELECT email,password FROM store_info WHERE store_url = '$shop_url'");
	if (mysqli_num_rows($select_store) > 0) {
		$data = mysqli_fetch_assoc($select_store);
		$_SESSION['email'] = $email;
		echo "cool";
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
