
<div id="login_form">
	<h3>Login with your Sendd shipping login credentials</h3>
	<form name="login_form" method="POST" action="#" id="login_form">
	<label>Email</label><input required type="text" name="email" id="email"/><br />
	<label>Password</label><input requried type="password" name="password" id="password"/><br/>
		<div class="msg">&nbsp;</div>
	<input type="submit" name="login" id="login" value="Login"/> 
	</form>
</div>
<script>
$('#login').click(function(e){
	e.preventDefault();
	alert(1);
			//get the values
			var email = $('#email').val();
			var password = $('#password').val();
			
			
			
			//validate the form
			if(email == '' || password == ''){
				$('.msg').text('Please fill the form');
			}else{
				$('.msg').html("<img src='loading.gif' border='0' />");			
				//jQuery ajax post method with 
				var shop_url = "<?php echo $_SESSION['shop'];?>";
				$.post('/checklogin.php', {email:email, password:password,shop_url:shop_url}, function(resp){
					console.log("resp="+resp);
					//var resp1= resp.find('.session_email').html();
					if(resp !=''){
						//location.href = 'hiddenpage.php';
						alert(resp1);
						
						
						alert("login  sucessfully");
					}else{
						$('.msg').html('Invalid Email or Password');			
					}
				});	
				
			}	
		});
</script>

