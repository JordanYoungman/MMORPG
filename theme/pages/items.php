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
			
				<body background="theme/assets/home-bg.JPG">
			<div id="wrapper">
				<div class="layer">
					<?php include 'header.php'; ?>
				</div>
				
				<div class="layer">
					<div class = "content">
					<p><?php echo $desc; ?> </p>
					<?php 
						if(isset($_SESSION['log'])){
						//Basically my DB-Connect
						$dbserver = "localhost";
						$dbusername = "root";
						$dbpassword = "";
						$db = "MMORPG";
						
						//create connection
						$conn = new mysqli($dbserver,$dbusername,$dbpassword, $db);
						
						//check connection
						if($conn->connect_error){
							die("connection failed: ".$conn->connect_error);
						}
							$username = $_SESSION['log'];
							
							$query = "SELECT id from users WHERE username = '$username'";
							$result = mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($result);
							
							
							//User data
							$userId = $row['id'];
							
							//Get STATS
							$query = "SELECT dpc,gold,level from stats WHERE user_id = '$userId'";
							$result = mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($result);
							
							
							//STATS
							$dpc = $row['dpc'];
							$gold = $row['gold'];
							$level = $row['level'];
							
							//Get MONSTER!
							$query = "SELECT name,hp,loot from monsters WHERE user_id = '$userId'";
							$result = mysqli_query($conn,$query);
							$row = mysqli_fetch_assoc($result);
							//MONSTER
							$mhp = $row ['hp'];
							$mname = $row ['name'];
							$mloot = $row ['loot'];
							
							
					?>
						<H3> Hello <?php echo $username; ?>  </H3>
						<div class = "battle-wrapper">
							<div class = "market">
							<h4>ITEMS</h4> 
							<?php	$query = "SELECT * FROM items ORDER BY cost ASC";
									$results=mysqli_query($conn,$query);
									$row_count=mysqli_num_rows($results);
									$row_users = mysqli_fetch_array($results);
									echo "<table border='1'>";
									while ($row_users = mysqli_fetch_array($results)) {
									echo "<tr><td>";
									echo "NAME: ";
									echo $row_users['name'];
									echo "<br>";
									echo "DMG: ";
									echo $row_users['dpc'];
									echo "<br>";
									echo "COST: ";
									echo $row_users['cost'];
									echo "<br>";
									echo $row_users['description'];
									echo "<br>";
									?>
									<form action="scripts/buy-handler.php" method="POST">
									<input type="hidden" name="username" value="<?php echo $username ?>">
									<button type="submit" value=<?php echo $row_users['id']?> name="buy"> BUY! </button>
									</form>
									<?php
									echo "</td>";
									echo "<td>";
									}
									echo "</table>";
									echo "Your Stats are DPC:" . $dpc . " GOLD:" . $gold;
							?> <br>
							<br>
							<br>
							
						
							</div>

							<div id = "chat" class = "chat">
							<style>.chat{margin-left: 50px;}</style>
							<?php
							$query = "SELECT username,msg from chat";
							$result = mysqli_query($conn,$query);
							$row = mysqli_fetch_array($result);
							
							while ($row = mysqli_fetch_array($result)){
							?>
								<span style="color:green;"><?php echo $row['username'];?></span>
								<span style="color:red;"><?php echo $row['msg'];?></span>
								<br>
							<?php
								}
								?>
							<div class = "chatbox">
							<form method ="post" action "index.php">
							<textarea name="msg" placeholder="enter message..."></textarea>
							<input type="submit" name="submit" value="Send it"/>
							</form>
							</div>
							<?php
							if(isset($_POST['submit'])){
									//Basically my DB-Connect
									$dbserver = "localhost";
									$dbusername = "root";
									$dbpassword = "";
									$db = "MMORPG";
									
									//create connection
									$conn = new mysqli($dbserver,$dbusername,$dbpassword, $db);
									
									//check connection
									if($conn->connect_error){
										die("connection failed: ".$conn->connect_error);
									}
									$user = $username;
									$msg = $_POST['msg'];;
								
									$sql = "INSERT INTO chat (username,msg)
									VALUES('$user','$msg')";
									if($conn->query($sql) === TRUE){
										echo "ADDED";
										header("refresh:2,url=index.php");
										die();
									}else{
										echo "NOT ADDED.";
										header("refresh:2,url=index.php");
										die();
									}									
							}
							?>
							</div>
					<?php 
					}
					?>
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