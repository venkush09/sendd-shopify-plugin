<?php

require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
$access_token=$_REQUEST['access_token'];
$shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );
try
{
	$orders = $shopify('GET /admin/orders.json');
	echo "<pre>";
	//print_r($orders);
	echo "</pre>";
	foreach($orders as $singleorder)
	{
		echo $id =$singleorder['id'];
		echo $name =$singleorder['name'];
		echo $created_at =$singleorder['created_at'];
		echo $gateway =$singleorder['gateway'];
		echo $financial_status=$singleorder['financial_status'];
		echo $total_price=$singleorder['total_price'];
		echo $customer_name=$singleorder['shipping_address']['name'];
		if($singleorder['fulfillment_status'] == ' ')
		{
			$fulfillment_status = 'Unfulfilled';
		}
		else 
		{
			$fulfillment_status = $singleorder['fulfillment_status'];
		}
		
		
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
