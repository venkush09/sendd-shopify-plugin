<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
	$shop_url = $_POST['shop_url'];
  if((isset($_REQUEST['id'])) || $_REQUEST['id']!=''){
    $id=$_REQUEST['id'];
  $delete_address = pg_query("delete FROM pickup_address WHERE shop_url='{$shop_url}' and id ={id}");
  print_r($delete_address);
	  if($delete_address){
	  echo "delete successfully";
	  }
	  else{
	  echo "ERROR";
	  }
  }
  ?>
