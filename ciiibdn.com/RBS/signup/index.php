<!DOCTYPE html>
<html>  
	<head>  
		<title>Register</title>  
		<meta charset="utf-8">
		<meta name=viewpoint content="width=device-width, initial-sacale=1">
   
		<link rel = "stylesheet" type = "text/css" href = "http://localhost/ibdn_raj/ciiibdn.com/RBS/common/css/signup.css">   

	</head>  
	<body>  
		<div class = "signup-container">   
			<form id="signup-form" name="signup-form" action = "http://localhost/ibdn_raj/ciiibdn.com/RBS/common/signup.php" method = "POST">  
				<div>
					<h1>CREATE ACCOUNT</h1> 
				
					<?php
						if(isset($_GET['msg'])){
							$errorm = $_GET['msg'];
							if ($errorm === 'invalidcmn'){
								echo '<p class="signup-alert">Invalid company member no</p>';
							}elseif ($errorm === 'invalidname'){
								echo '<p class="signup-alert">Invalid name</p>';
							}elseif ($errorm === 'invalidemail'){
								echo '<p class="signup-alert">Invalid email id</p>';
							}elseif ($errorm === 'emailexists'){
								echo '<p class="signup-alert">email already registered</p>';
							}elseif ($errorm === 'invaliduname'){
								echo '<p class="signup-alert">Invalid username</p>';
							}elseif ($errorm === 'invaliduexists'){
								echo '<p class="signup-alert">username already present</p>';
							}elseif ($errorm === 'dberror'){
								echo '<p class="signup-alert">database error failed to register</p>';
							}
						}
					?>

					<div class="signup-pad">  
						<label for="cmn"> </label>  
						<input type = "text" id ="cmn" name  = "cmn" placeholder= "Company membership number" required />  
					</div>  

					<div class="signup-pad">  
						<label for=" name"> </label>  
						<input type = "text" id ="name" name  = "name" placeholder= "Name" required />  
					</div>  

					<div class="signup-pad">  
						<label for="email"> </label>  
						<input type = "email" id ="email" name  = "email" placeholder= "Email address" required />  
					</div>  
					<div class="signup-pad">  
						<label for="username"> </label>  
						<input type = "text" id ="username" name  = "username" placeholder= "Create username" required />  
					</div>  
					<div class="signup-pad">  
						<label for="password"> </label>  
						<input type = "password" id ="password" name  = "password" placeholder= "Create password" required />  
					</div>  
					<div class="signup-pad">  
						<label for="text"> </label>  
						<input type = "text" id ="text" name  = "text" placeholder= "Tell us something about you" required />  
					</div> 
					<div class="signup-pad">     
						<input type =  "submit" id = "submitbtn" name= "submit" value = "Sign up" />  
					</div>  
				</div>
			</form>  
		</div>
	</body>
</html>