<?php
    session_start();
?>
<!DOCTYPE html>
<html>  
	<head>  
		<title>MyPost Page</title>  
   
		<link rel = "stylesheet" type = "text/css" href = "style.css">   

	</head>  
	<body>  
		<div class="mypost-continer"> 
		<form id="logout-form" name="logout-form" action = "http://localhost/ibdn_raj/ciiibdn.com/RBS/common/logout.php" method = "POST">
			<h1> My Post Page</h1>  
			<?php
			if (isset($_SESSION['userId'])){
				echo '<p>Welcome ' . $_SESSION['userName'] . ' !</p>';
			}
			?>
			<div>   
				<input type ="submit" id = "logoutbtn" name="logout-submit" value = "Logout" />  
			</div>

		</div>
	</body>
</html>