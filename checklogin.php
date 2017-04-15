<?php 
	echo "hello";
	$email= $_POST['email'];
	$password= $_POST['password'];
        echo "<script>alert(1);</scripr>";
	echo "$email=".$email;
	//convert string to md5
	$password 	= md5($password);
	
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
