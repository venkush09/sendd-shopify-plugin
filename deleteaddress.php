<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
	$shop_url = $_POST['shop_url'];
  if((isset($_REQUEST['id'])) || $_REQUEST['id']!=''){
    $id=$_REQUEST['id'];
	  echo "DELETE FROM pickup_address WHERE shop_url='{$shop_url}' AND id ={id}";
  $delete_address = pg_query($dbconn4,"DELETE FROM pickup_address WHERE shop_url='{$shop_url}' AND id ={id}");
  print_r($delete_address);
	  
	  echo "delete successfully";
	  
  }
  ?>
