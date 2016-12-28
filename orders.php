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
	echo "<a href='#popup_content' class='fancybox_btn'>Submit</a>";
	
	echo '<table class="table-hover expanded">';
	 echo "<thead><tr>";
	 echo '<th>&nbsp;</th><th><span>Order</span></th>
                          <th class="is-sortable">
                            <span>Date</span>
                          </th>
                          <th class="is-sortable">
                            <span>Customer</span>
                          </th>
                          <th class="is-sortable ">
                            <span>Payment status</span>
                          </th>
                          <th class="is-sortable sorted-desc">
                            <span>Fulfillment status</span>
                          </th>
                          <th class="type--right is-sortable ">
                            <span>Total</span>
                          </th>
                        </tr>
                      </thead>';
					  echo '<tbody>';
	foreach($orders as $singleorder)
	{
		 $id =$singleorder['id'];
		 $name =$singleorder['name'];
		 $created_at =$singleorder['created_at'];
		 $gateway =$singleorder['gateway'];
		 $financial_status=$singleorder['financial_status'];
		 $total_price=$singleorder['total_price']; 
		 $email=$singleorder['email'];
		 $address=$singleorder['shipping_address']['address1'];
		 $city=$singleorder['shipping_address']['city'];
		 $zip=$singleorder['shipping_address']['zip'];
		 $province=$singleorder['shipping_address']['province'];
		 $country=$singleorder['shipping_address']['country'];
		 $customer_name=$singleorder['shipping_address']['name'];
		 $full_address =$customer_name.",".$address .",".$city .",".$province.",".$country."-".$zip;
		if($singleorder['fulfillment_status'] == '')
		{
			$fulfillment_status = 'Unfulfilled';
		}
		else 
		{
			$fulfillment_status = $singleorder['fulfillment_status'];
		}
		echo "<tr>";
		echo "<td><input type='checkbox' class='select_box' name='order_ids_$id'  value='$id'  data-customer_total-price='$total_price' data-customer_email='$email' data-customer_name='$customer_name' data-address='$full_address' data-gateway='$gateway'></td>";
		echo "<td>".$name."</td>";
		echo "<td>".$created_at."</td>";
		echo "<td>".$customer_name."</td>";
		echo "<td>".$financial_status."</td>";
		echo "<td>".$fulfillment_status."</td>";
		echo "<td>".$total_price."</td>";
		echo "</tr>";
		
	}
	 echo '</tbody>';
	  echo '</table>';
}
catch (shopify\ApiException $e)
{
	# HTTP status code was >= 400 or response contained the key 'errors'
	echo $e;
	print_r($e->getRequest());
	print_r($e->getResponse());
}

require __DIR__.'/popupcontent.php'; //popup content



?>
