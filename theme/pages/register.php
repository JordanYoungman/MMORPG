<?php
	global $title;
	global $desc;
	global $logo;
?>
<html>
			<head>				
					<title><?php echo $title; ?></title>
					<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
					<meta charset="utf-8">
					<meta http-equiv="X-UA-Compatible" content="IE=edge">
					<meta name="viewport" content="width=device-width, initial-scale=1">
					<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

					<!-- Bootstrap -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
					<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
					
					<!-- Body Font -->
					<link href="theme/css/font.css" rel="stylesheet" type = "text/css">
					
			</head>
			
				<body>
				<body background="theme/assets/login-bg.JPG">
			<div id="wrapper">
				<div class="layer">
				<?php include 'header.php'; ?>
				</div>
				
				<div class="layer">
					<div class = "content">
					 <form action="scripts/register-handler.php" method="POST">

					  <div class="container">
					  	<h2>Register Adventurer</h2>
						
						<b><br>Email</b></label>
						<input type="text" placeholder="Enter Email" name="email" required>
						
						<b><br><br>Username:</b>
						<input type="text" placeholder="Enter Username" name="uname" required>

						<b><br><br>Password:</b>
						<input type="password" placeholder="Enter Password" name="psw" required>

						<br><br><button type="submit">Login</button>
					  </div>
					</form> 
					</div>
				</div>

				<div class="layer">
					<div class ="footer">
					Copyright ©2018 <?php echo $title; ?>
					</div>
				</div>
				</body>
			</div>
</html>