<?php 
$conn_string = "host=ec2-23-21-76-49.compute-1.amazonaws.com port=5432 dbname=de3jdei5ioil58 user=uzumoeocrpjdko password=0ce1ed6bd7f4fb708816b4538fb612e79d0f33e2b993353bb8a99b1f51890fb2";
$dbconn4 = pg_connect($conn_string);
//connect to a database named "dcdhmp2hbn5ol8" on the host "ec2-174-129-223-35.compute-1.amazonaws.com" with a username and password
if(!$dbconn4){ 
	echo "Error : Unable to open database\n"; 
}
else{
	echo "balle balle : able to open database\n";
	$data ="select count(*) from pg_class where relname='user_table' and relkind='r'";
	$a = pg_query($dbconn4, $data);
	print_r($a);
   $query = "SELECT * FROM user_table";
echo $query;
$a = pg_query($dbconn4, $query);
if (mysqli_num_rows($a) > 0) {
$data = mysqli_fetch_assoc($a);
 echo $email= $data['email'];
 echo $shop_url = $data['store_url'];
}
    }
?>
