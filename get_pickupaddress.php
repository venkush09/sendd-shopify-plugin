
<?php 
session_start();
require __DIR__.'/connection.php'; //DB connectivity
if((isset($_REQUEST['pickupaddres'])) || $_REQUEST['pickupaddres']!=''){
		$shop_url=$_REQUEST['shop'];
	 $pickup_address = pg_query($dbconn4, "SELECT * FROM pickup_address WHERE shop_url ='{$shop_url}'");
		 if(pg_num_rows($pickup_address)){
			 echo '<h5>Pickup Address*</h5><label>Pickup Company Name:</label><input type="text" class="p_company_name" value="">';
			 echo '<label>Pickup address:</label><select name="pickup_address" class="pickup_address">';
			while ($row = pg_fetch_assoc($pickup_address)) {
				echo '<option data-companyname="'.trim($row['companyname']).'" value="'.trim($row['address_line1']).'" data-address2="'.trim($row['address_line2']).'" selected>'.trim($row['username']).':'.trim($row['address_line1']).','.trim($row['city']).'_'.trim($row['zipcode']).'::'.trim($row['phoneno']).'</option>';
			
	   }
		}
		 echo "</select>";
	
}?>
