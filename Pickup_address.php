<div class="pickupadreess">
  <div class="address_1">
  <form action="" method="POST" id="form_1">
    <input type="hidden" value="address 1">
    <input type="text" name="username" required>
    <input type="textarea" name="address_line1" required max="60">
    <input type="textarea" name="address_line2"  max="60">
    <input type="text" name="zipcode" required>
    <input type="text" name="phoneno" required>
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
		var planDiv = ' <form action="" method="POST" id="form_'+address_id+'"><input type="hidden" value="address '+address_id+'"><input type="text" name="username" required><input type="textarea" name="address_line1" required max="60"><input type="textarea" name="address_line2"  max="60"><input type="text" name="zipcode" required><input type="text" name="phoneno" required> <input type="submit" name="address'+address_id+'" value="Save Address"></form>'; 
		$("div[class^=addnewaddress]:last").after(planDiv);
	});

</script>
