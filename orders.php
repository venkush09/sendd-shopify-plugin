<?php

require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
$access_token=$_REQUEST['access_token'];
$shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );
try
{
	$orders = $shopify('GET /admin/orders.json');
	echo "<pre>";
	print_r($orders);
	echo "</pre>";
	foreach($orders as $singleorder)
	{
		echo $id =$singleorder['id'];
		echo $name =$singleorder['name'];
		echo $created_at =$singleorder['created_at'];
		
		
		
	}
}
catch (shopify\ApiException $e)
{
	# HTTP status code was >= 400 or response contained the key 'errors'
	echo $e;
	print_r($e->getRequest());
	print_r($e->getResponse());
}





?>
