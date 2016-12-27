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
?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="jquery.fancybox.js"></script>
<link rel="stylesheet" href="jquery.fancybox.css" type="text/css">

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
	$('body').on('click', 'a.fancybox_btn', function() {
    $(this).fancybox();
}); 
	
})(jQuery);
</script>
