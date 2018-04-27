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

	//VARIABLES ASSIGNED FROM FORM
	$username = $_POST['uname'];
	$password = $_POST['psw'];
	$email = $_POST['email'];
	$GLOBALS['username'] = $username;
	
	//Encrypt Password
	$password = md5($password);
	
	//CHECK IF USER IS UNIQUE
	$sql = "SELECT username FROM users WHERE username = '$username'";
	if($result=mysqli_query($conn,$sql)){
		$rowcount = mysqli_num_rows($result);
	}
	
	if($rowcount >= 1){
		echo "USERNAME TAKEN.";
	} else {
	//INSERT DATA INTO DB
	$sql = "INSERT INTO users (username,password,email)
	VALUES('$username','$password','$email')";	
	
	
	//EXECUTE QUERY
	if($conn->query($sql) === TRUE){
		echo "ADDED";
		$query = "SELECT id from users WHERE username = '$username'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		
		$id = $row['id'];

		$sql1 = "INSERT INTO stats (user_id,dpc,gold,hp,level)
		VALUES('$id','5','300','10','1')";
		$sql2 = "INSERT INTO monsters (user_id,level,hp,name,loot)
		VALUES('$id','1','10','Slime','300')";
		mysqli_query($conn,$sql1);
		mysqli_query($conn,$sql2);
		ECHO "DONE!";
		header("refresh:2,url=../index.php?page=login");
		die();
	}else{
		echo "NOT ADDED.";
		header("Location: ../index.php");
		die();
	}
}
?>

