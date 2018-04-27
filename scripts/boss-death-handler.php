<?php
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
	
	$userId = $_POST['ID'];
	$sql = "SELECT * FROM stats";
	$result = $conn->query($sql);
	
	$count = 0;
	while($row = $result->fetch_assoc())
	{
		$sql = "SELECT loot from monsters WHERE user_id = '10'";	
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);		
							
		//STATS
		$loot = $row['loot'];
		
		$sql = "UPDATE stats SET gold = gold + '$loot' WHERE user_id = '$userId'";
		$sql1 = "UPDATE monsters SET hp = '100' WHERE user_id = '10'";			
		mysqli_query($conn,$sql1);
		if(mysqli_query($conn,$sql)){
		header("Location: ../index.php?page=boss");
		}else{
			echo "Nah";
			}
		}
?>

