<!DOCTYPE html>
<html>  
	<head>  
		<title>Login</title>  
		<meta charset="utf-8">
		<meta name=viewpoint content="width=device-width, initial-sacale=1">
   
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/ibdn_raj/ciiibdn.com/RBS/common/css/login.css">   
	</head>  
	<body>  
		<div class="form-container"> 
			<form id="login-form" name="login-form" action = "http://localhost/ibdn_raj/ciiibdn.com/RBS/common/login.php" method = "POST"> 
				
				<h1>WELCOME &#128578;<br> PLEASE LOGIN TO YOUR ACCOUNT</h1>

				<?php
					if(isset($_GET['msg'])){
						$errorm = $_GET['msg'];
						if ($errorm === 'invalidlname'){
							echo '<p class="login-ealert">Invaid Username</p>';
						}elseif ($errorm === 'invalidlpass'){
							echo '<p class="login-ealert">Incorrect password</p>';
						}elseif ($errorm === 'success'){
							echo '<p class="login-salert">Sucessfully Registered, please login</p>';
						}
					}
				?>
				
				<div class="login-user">
					<label for="log-username" class="login-block">USERNAME</label>
					<input type = "text" id ="log-username" name  = "username" required /> 
				</div> 

				<div class="login-user">
					<label for="log-password" class="login-block">PASSWORD</label>  
					<input type = "password" id ="log-password" name  = "password" required />  
				</div> 

				<div >   
					<input type ="submit" id = "loginbtn" name="login-submit" value = "Login" />  
				</div>

				<div>   
					<button type="button" id="signupbtn">
						<a href="http://localhost/ibdn_raj/ciiibdn.com/RBS/signup">Signup</a>
					</button>
				</div>

				<div class="login-signtxt">
					By signing up,you agree to IBDN's
				</div>

				<div class="login-termtxt">
					Terms & conditions & Privacy Policy
				</div>

				<img id="login-logo" src="http://localhost/ibdn_raj/ciiibdn.com/RBS/login/img/NatWest-Logo.png">

				<div class="login-devtxt">
					<P>Developed by</br>NatWest Group</P>
				</div>

			</form>  
		</div>
	</body>
</html>