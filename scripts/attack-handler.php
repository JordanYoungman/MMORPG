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

		$sql = "SELECT * FROM monsters WHERE user_id = '$userId'";
		$result = $conn->query($sql);
		
		$count = 0;
		while($row = $result->fetch_assoc())
		{

			$sql = "SELECT dpc from stats WHERE user_id = '$userId'";
			$result = mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);		
								
			//STATS
			$dpc = $row['dpc'];
			
			$sql = "UPDATE monsters SET hp = hp - '$dpc' WHERE user_id = $userId";
			if(mysqli_query($conn,$sql)){
			if (isset($_POST['attack'])) {
				header("Location: ../index.php?page=boss");
			} else {
				header("Location: ../index.php");
			}
			die();
			}else{
			header("Location: ../index.php?page=boss");
			die();
				}
		}
?>

