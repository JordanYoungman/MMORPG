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
	} else {
	$query = "SELECT id,title,description,logo from config";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	
	
		//Page Variables
	$title = $row['title'];
	$desc = $row['description'];
	$logo = $row['logo'];
	}
?>