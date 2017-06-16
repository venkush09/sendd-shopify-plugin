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
$(document).ready(function(){
var request = new XMLHttpRequest();

request.open('POST', 'https://api-staging.sendd.co/rest-auth/login/');

request.setRequestHeader('Content-Type', 'application/json');

request.onreadystatechange = function () {
  if (this.readyState === 4) {
    console.log('Status:', this.status);
    console.log('Headers:', this.getAllResponseHeaders());
    console.log('Body:', this.responseText);
  }
};

var body = {
  'email': 'hello@creativecases.in',
  'password': 'hello@creativecases.in'
};

request.send(JSON.stringify(body));
});
</script>
<?php
if(isset($_REQUEST['login']) || $_REQUEST['login']!=''){
 echo $email_id=$_REQUEST['email'];
  echo $password=$_REQUEST['password'];
  $ch = curl_init();


curl_setopt($ch, CURLOPT_URL, "https://api-staging.sendd.co/rest-auth/login/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, "{
  \"email\": \"hello@creativecases.in\",
  \"password\": \"hello@creativecases.in\"
}");

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json"
));

echo $response = curl_exec($ch);
curl_close($ch);

//var_dump($response);
}
?>
