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
	
	$sql = "SELECT * FROM stats";
	$result = $conn->query($sql);
	
	$id = $_POST['buy'];
	
	$count = 0;
	while($row = $result->fetch_assoc())
	{
		$sql = "SELECT dpc,cost from items WHERE id = '$id'";	
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);		
							
		//STATS
		$dpc = $row['dpc'];
		$cost = $row['cost'];
		
		$username = $_POST['username'];
		$query = "SELECT id from users WHERE username = '$username'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);

		$userId = $row ['id'];
		
		$sql = "UPDATE stats SET gold = gold - '$cost' WHERE user_id = '$userId'";
		$sql1 = "UPDATE stats SET dpc = dpc + '$dpc' WHERE user_id = '$userId'";			
		mysqli_query($conn,$sql1);
		if(mysqli_query($conn,$sql)){
		("Location: ../index?page=market.php");
		echo "Check";
		}else{
			echo "Nah";
			}
		}
?>

