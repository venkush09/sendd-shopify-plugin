<?php

require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
$access_token=$_REQUEST['access_token'];
 $order_id= $_REQUEST['order_id'];
 $trackingcode= $_REQUEST['trackingcode'];
 $trackingcompany= $_REQUEST['trackingcompany'];
$shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );


$shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );
try{
$arguments	= array( "note_attributes" => array("name"=>"tracking_number","value"=> $trackingcode,"name"=>"tracking_company","value"=> $trackingcompany));			
 $orders = $shopify('PUT /admin/orders/'.$order_id.'.json',$arguments);
 
	print_r($orders);
}
catch (shopify\ApiException $e)
{
	# HTTP status code was >= 400 or response contained the key 'errors'
	echo $e;
	print_r($e->getRequest());
	print_r($e->getResponse());
}

?>
