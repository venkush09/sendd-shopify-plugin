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
<script src="js/jquery.fancybox.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css">
<script src="js/owl.carousel.min.js"></script>
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/jquery.fancybox.css" type="text/css">
 <link href="https://cdn.shopify.com/s/files/1/1517/9050/t/4/assets/slick.css?11834161533387882948"  rel="stylesheet" type="text/css"/>  
	
     
<script src="https://rawgit.com/kenwheeler/slick/master/slick/slick.js" type="text/javascript"></script>
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
	$('.popupcontent_inner').html('');
	var content ;
	 var len = $('.select_box:checkbox:checked').length;
	 if(len > 0){
	$('.select_box:checkbox:checked').each(function(index){
	var customer_email = $(this).attr('data-customer_email');
	var customer_name = $(this).attr('data-customer_name');
	var customer_address = $(this).attr('data-address');
	var payment_method = $(this).attr('data-gateway');
	 content ='<div class="item"><h3>Shipping information</h3><label>Pickup Address*</label><select name="pickup_address"><option>AMIT KAUSHAL:h.no.88, top floor, gali no.2neb sarai,South West Delhi,Delhi- 110068</option><option>Mohini Ranjan Meher:HIG 26 BDA Complex, Jaydev ViharOpp Pal Helght,Khorda,Odisha- 751013</option><option>Nidall Abdul Aziz:4A3, Green Terrace ApartmentsSeaport Airport Road, Kochi,Ernakulam,Kerala- 682021</option><option>Harshit Jaswani:567/B sector k aashiyana colonyNear chiranjiv bharti park,Lucknow,Uttar Pradesh- 226012 </option><option>Mohamed Athif:Kottathara Nalakath House ,B.P Angadi POVia ,Malappuram Dist,Malappuram,Kerala- 676102 </option><option>Shashank Nagrale:A-103, KPR Elite Apartment, Kasavanahalli Main Road, Off SarNear Andhra Bank,Bangalore,Karnataka- 560035</option><option>Amit Malik:House number 142, Room number 1Katwaria Sarai, Hauz Khas,South West Delhi,Delhi- 110016</option><option>Naveen Kishore:1/297, Rajaji nagar, 1st cross, Royakotta main RoadNear MGM palace logde,,Krishnagiri,Tamil Nadu- 635001</option><option>Krishna Kanth Jaju:Ganesh boys hostel, room no F3Datta Meghe institute of medical sciences,Wardha,Maharashtra- 442001</option><option>Abhijeet Ranpise:102, Rutu business park, majiwada service roadAbove ccd and Pizza Hut, thane west,Thane,Maharashtra- 400601<option></select>';
	 content = content + '<label>Customer Name:</label><input type="text" class="customer_name" value="'+customer_name+'"><br><label>Customer Email:</label><input type="text" class="customer_email" value="'+customer_email+'"><br><label>Customer Address:</label><textarea class="customer_address" value="'+customer_address+'">'+customer_address+'</textarea>';
	 content = content + '<br><label>Payment Type:</label><p>"'+payment_method+'"</p></div>';


	$('.popupcontent_inner').append(content);
	});
	// Define data for the popup
		function sliderInit(){
	 $('.popupcontent_inner').slick({
	 slidesToShow: 1,
		slidesToScroll:1,
		dots: true,
		
		
	 
	 });
	};
	sliderInit();
	jQuery('#popup_content').show();
      jQuery(".background_overlay").fadeIn(800);
	jQuery('#popup_content').css({
          left: (jQuery(window).width() - jQuery('#popup_content').width()) / 2,
          top: (jQuery(window).width() - jQuery('#popup_content').width()) / 2,
          position:'relative'
      });
    
	}
	else {
	  alert("First Select the orders");
	}
	
}); 
	
})(jQuery);
function closepopup(){
    if(jQuery('.popupcontent_inner').is(':visible')){	
		jQuery('.popupcontent_inner').fadeOut(800);
		jQuery(".background_overlay").fadeOut(800);
	}
  }


</script>
