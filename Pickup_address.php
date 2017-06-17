<div class="pickupadreess">
<div class="address_1">
<h3>Pickup Address 1</h3>
  <form action="" method="POST" id="form_1">
    <input type="hidden" value="address 1">
    <input type="text" name="username" placeholder="Name" required>
    <input type="textarea" name="address_line1" placeholder="Adrress 1" required max="60">
    <input type="textarea" name="address_line2" placeholder="Adrress 2"  max="60">
	<input type="text" name="city" placeholder="City" required>
    <input type="text" name="zipcode" placeholder="Zip Code" required>
    <input type="text" name="phoneno" placeholder="Phone no" required>
    <input type="submit" name="address1" value="Save Address">
  </form>
  </div>
  <div class="addnewaddress"></div>
	<br/>
	<input type="button" id="add_new_address" value="Add New Address" /><br/> 
</div>
<script>
$("#add_new_address").click(function() {
	alert(1);
		var address_id = parseInt($('.addnewaddress').length+1);	
	alert(1);
		var planDiv = '<h3>Pickup Address '+address_id+'</h3> <form action="" method="POST" id="form_'+address_id+'"><input type="hidden" value="address '+address_id+'" placeholder="Name"><input type="text" name="username" required><input type="textarea" name="address_line1" required max="60" placeholder="Address 1"><input type="textarea" name="address_line2"  max="60" placeholder="Adrress 2"><input type="text" name="city" required placeholder="city"><input type="text" name="zipcode" placeholder="Zip Code" required><input type="text" name="phoneno" placeholder="Phone No" required> <input type="submit" name="address'+address_id+'" value="Save Address"></form>'; 
		$("div[class^=addnewaddress]:last").after(planDiv);
	});

</script>
