<?php
session_start();
// Required File Start.........
require __DIR__.'/conf.php'; //Configuration
require __DIR__.'/connection.php'; //DB connectivity
require __DIR__.'/vendor/autoload.php';
use phpish\shopify;
// Required File END...........
error_reporting(E_ALL);
ini_set('display_errors', 1);
// require __DIR__.'/get_products.php'; //GET PRODUCTS
//echo $_REQUEST['code'];
if((isset($_REQUEST['shop'])) && (isset($_REQUEST['code'])) && $_REQUEST['shop']!='' && $_REQUEST['code']!='' )
{
	$_SESSION['shop']=$_REQUEST['shop'];
	$_SESSION['code']=$_REQUEST['code'];
}
$access_token = shopify\access_token($_REQUEST['shop'], SHOPIFY_APP_API_KEY, SHOPIFY_APP_SHARED_SECRET, $_REQUEST['code']);
$shopify = shopify\client($_REQUEST['shop'], SHOPIFY_APP_API_KEY, $access_token );
try{
	$arguments	= array( "fulfillment" => array("tracking_number" => '123456789'));
				
 $orders = $shopify('PUT /admin/orders/fulfillments/4488303880.json',$arguments);
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
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet"> 
 
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/988a7dc35f.js"></script>
<script src="js/jquery.fancybox.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css">
<script src="js/owl.carousel.min.js"></script>
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css">
 <link href="css/slick.css"  rel="stylesheet" type="text/css"/>  
<script src="js/slick.js" type="text/javascript"></script>
<div class="background_overlay" style="display:none"></div>
<div class="content-container"></div>

<script>

// Get orders
function getorders(){

	var access_token='<?php echo $access_token ?>';
	var shop='<?php echo $_REQUEST['shop'] ?>';

	$.ajax({
		url: '/orders.php?access_token='+access_token+'&shop='+shop,
		success: function(data){
			console.log(data);
			$('.content-container').html(data);
			
		}
	});
}
// Initial Page Load
(function($) {
	$(document).ready(function() {
		getorders(); // start the loop
	});
	$('body').on('click', 'a.fancybox_btn', function(e) {
		e.preventDefault();
		$('.popupcontent_inner').remove();
		$('#popup_content').append('<div class="popupcontent_inner"></div>');
		var content ;
		 var len = $('.select_box:checkbox:checked').length;
		 if(len > 0){
			$('.select_box:checkbox:checked').each(function(index){
				    var order_id = $(this).val(); 
					var customer_email = $(this).attr('data-customer_email');
					var customer_name = $(this).attr('data-customer_name');
					var customer_address = $(this).attr('data-address');
					var payment_method = $(this).attr('data-gateway');
					var customer_phone = $(this).attr('data-customer_phone');
					var customer_total_price = $(this).attr('data-customer_total-price');
					var total_weight = $(this).attr('data-total_weight');
					var quantity_total = $(this).attr('data-quantity_total');
					content ='<div class="item"><div class="item_inner"><h3>Shipping information</h3><input type="hidden" value="'+total_weight+'" data-order_id="'+order_id+'" data-quantity_total="'+quantity_total+'" class="total_weight"> <div class="fhalf"><h5>Pickup Address*</h5><label>Pickup Company Name:</label><input type="text" class="p_company_name" value="Lomdi Outfitters"<br><label>Pickup phone:</label><input type="text" class="p_phone" value=""><br><label>Pickup email id:</label><input type="text" class="p_emailid" value=""><br><label>Pickup address:</label><select name="pickup_address" class="pickup_address"><option value="1" selected>AMIT KAUSHAL:h.no.88, top floor, gali no.2neb sarai-160059</option><option value="2">Mohini Ranjan Meher:HIG 26 BDA Complex-160059</option><option value="3">Nidall Abdul Aziz:4A3-160059</option><option value="4">Harshit Jaswani:567/B -160059</option><option value="5">Mohamed Athif:Kottathara Nalakath House-160059 </option><option value="6">Shashank Nagrale:A-103, KPR Elite Apartment, Kasavanahalli Main Road-160059</option><option value="7">Amit Malik:House number 142, Room number 1Katwaria Sarai, Hauz Khas-160059</option></select></div>';
					content = content + '<div class="shalf"><label>Customer Name:</label><input type="text" class="customer_name" value="'+customer_name+'"><br><label>Customer Email:</label><input type="text" class="customer_email" value="'+customer_email+'"><br><label>Customer phone:</label><input type="text" class="customer_phone" value="'+customer_phone+'"><br><label>Customer Address:</label><textarea class="customer_address" value="'+customer_address+'">'+customer_address+'</textarea><label>Total amount pay:</label><input type="text" class="customer_total_price" value="'+customer_total_price+'">';
					content = content + '<br><label>Payment Type: <p class="payment_method">"'+payment_method+'"</p></label>';
					content = content + '<br><div class="c_type"><label>Content</label><span><input type="radio" checked value="P" name="content_type" class="content_type">Product</span> <span><input type="radio" value="D" name="content_type" class="content_type">Documents</span></div></div></div>';

					$('.popupcontent_inner').append(content);
		
			});
				var content_last ="<div class='item'><div class='item_inner last'><a href='#' class='Create_order'>Create Order</a></div></div>";
				$('.popupcontent_inner').append(content_last);
				// Define data for the popup
					function sliderInit(){
						$('.popupcontent_inner').slick({
							slidesToShow: 1,
							dots: true,
							infinite: false,
						});
		 
					};
					sliderInit(); // call slider function
					jQuery('#popup_content').show();
					$('.popupcontent_inner').get(0).slick.setPosition();
					jQuery(".background_overlay").fadeIn(800);
	
    
		}
	
		else {
		  alert("First Select the orders");
		}
	
	}); 
	
})(jQuery);
	function closepopup(){
		if(jQuery('#popup_content').is(':visible')){	
			jQuery('#popup_content').fadeOut(800);
			jQuery(".background_overlay").fadeOut(800);
		}
	}
$('body').on('click', 'a.Create_order', function(e) {
  var leng = $('.popupcontent_inner .item').length;
	$('.popupcontent_inner .item').each(function(index){
		if(index < leng-1){
		  /* pickup address detail*/
		   var pickup_address = $('.pickup_address option:selected',this).text();
		   var content_type = $('.content_type:checked',this).val();
		   var customer_total_price = $('.customer_total_price',this).val();
		   var p_company_name = $('.p_company_name',this).val();
		   var p_contact_person = pickup_address.split(':')[0];
		   //var p_contact_person = $('.p_contact_person',this).val();
		   var p_phone = $('.p_phone',this).val();
		   var p_emailid = $('.p_emailid',this).val();
		   var p_zipcode = pickup_address.split('-')[1];		   
		   //var p_zipcode = $('.p_zipcode',this).val();
			alert("p_zipcode" +p_zipcode);
		 /* pickup address detail*/
		  /*customer  detail*/
		   var customer_name = $('.customer_name',this).val();
		   var customer_phone = $('.customer_phone',this).val();
		   var customer_email = $('.customer_email',this).val();
		   var customer_address = $('.customer_address',this).val();
		   var total_weight = $('.total_weight',this).val();
		   if(total_weight == '')
		   {
		   total_weight =0.001;
		   }
		   var total_qty = $('.total_weight',this).attr('data-quantity_total');
		   var order_id = $('.total_weight',this).attr('data-order_id');
		   customer_address = customer_address.split(',');
				
			var c_address = customer_address[0];
			var c_city = customer_address[1];
			var c_state = customer_address[2];
			var c_country = customer_address[3].split('-')[0];	
			var c_zipcode = customer_address[3].split('-')[1];	
			//alert(c_zipcode);
			var payment_method = $('.payment_method').text();
			if(payment_method == '"Cash on Delivery (COD)"')
			{
			var collectable_value= customer_total_price;
			payment_method = 1;
			}
			else{
			payment_method = 0;
			}
			/* customer detail*/
	   
		  var request = new XMLHttpRequest();

			request.open('POST', 'https://api-staging.sendd.co/core/api/v1/order/');

			request.setRequestHeader('Content-Type', 'application/json');
			request.setRequestHeader('Authorization', 'Token 5150fd17fe0bbb7d81c122a85b737ed1581c05b7');

			request.onreadystatechange = function () {
			  if (this.readyState === 4) {
				console.log('Status:', this.status);
				console.log('Headers:', this.getAllResponseHeaders());
				console.log('Body:', this.responseText);
				var json = JSON.parse(this.responseText);
				console.log(json);
			console.log('tracking_number12:', json['tracking_number']);
			 var tracking_no= json['tracking_number'];
			 
			  }
			};

			var body = {
			  'customer_reference_id': '123',
			  'shipments': [
				{
				  'item_detail': {
					'content': content_type,
					'purpose': 'C',
					'value': customer_total_price,
					'qty':total_qty,
					'weight':0.5,
					'fragile': false,
					collectable_value,
					'description': 'Sample Product'
					
				  }
				}
			  ],
			  'pickup_detail': {
			   'address_type': 'O',
				'company_name': p_company_name,
				'contact_person': p_contact_person,
				'phone': p_phone,
				'email': p_emailid,
				'address_1': pickup_address,
				'pincode': p_zipcode,
				 'country': 'IN',
				
			  },
			  'delivery_detail': {
				'address_type': 'H',
				'contact_person': customer_name,
				'phone': customer_phone,
				'email': customer_email,
				'address_1': c_address,
				'pincode': c_zipcode,
				'city': c_city,
				'state': c_state,
				'country': c_country,
				
			  },
			  'shipping_type': 'E',
			  'cod': payment_method,
			  'insurance': false,
			  'process': true,
			  
			};

			request.send(JSON.stringify(body));
		}
	});
});

</script>
