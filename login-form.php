<div id="login_form" class="loginform">
	<div class="api-toggle">
	<div class="checkbox-container">

    <input type="hidden" id="on-off-switch-custom" value="1">

    <script type="text/javascript">
        new DG.OnOffSwitch({
            el: '#on-off-switch-custom',
            height: 150,
            trackColorOn:'#F57C00',
            trackColorOff:'#666',
            trackBorderColor:'#555',
            textColorOff:'#fff',
            textOn:'Live Mode',
            textOff:'Test Mode'
        });
    </script>
</div></div>
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
	//get the values
		var email = $('#email').val();
		var password = $('#password').val();
		//validate the form
		if(email == '' || password == ''){
			$('.msg').text('Please fill the form');
		}else{
				$('.msg').html("<img src='loading.gif' border='0' />");	
			var request = new XMLHttpRequest();

			request.open('POST', 'https://api-staging.sendd.co/rest-auth/login/');

			request.setRequestHeader('Content-Type', 'application/json');

			request.onreadystatechange = function () {
			  if (this.readyState === 4) {
				console.log('Status:', this.status);
				console.log('Headers:', this.getAllResponseHeaders());
				console.log('Body:', this.responseText);
				
				if(this.responseText.indexOf('key')){
			      var access_key=JSON.parse(this.responseText);
				  access_key =access_key.key;
				  var shop_url = "<?php echo $_SESSION['shop'];?>";
				$.post('/checklogin.php', {access_key:access_key,shop_url:shop_url}, function(resp){
					console.log("resp="+resp);
					//var resp1= resp.find('.session_email').html();
					if(resp =='cool'){
						//location.href = 'hiddenpage.php';
						alert("login  sucessfully");
						$('.msg').html('login  sucessfully');		
					}else{
						$('.msg').html('error while saving data');			
					}
				});
				}
				else{
					alert(this.responseText);
				}
			  }
			};

			var body = {
			  'email': email,
			  'password':password
			};

			request.send(JSON.stringify(body));
			console.log(request.send(JSON.stringify(body)));
		}
});
</script>

