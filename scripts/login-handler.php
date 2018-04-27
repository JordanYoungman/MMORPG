<?php
	session_start();
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
	
	//Encrypt Password
	$password = md5($password);
	
	//CHECK IF USER IS UNIQUE
	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	if($result=mysqli_query($conn,$sql)){
		$rowcount = mysqli_num_rows($result);
	}
	
	if($rowcount == 1){
		$_SESSION['log'] = $username;
		echo "Details Are Correct!";
		header("refresh:2,url=../index.php");
		die();
	} else {
		echo "USER DOESN'T EXIST.";
		header("refresh:2,url=../index.php");
}
?>

