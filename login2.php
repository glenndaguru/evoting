<?php
	// Data From App
	$userEmail = $_POST["userEmail"];
	$userPass = $_POST["userPass"];

	// Connection
	$servername = "127.4.48.2";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";
	$dbname = "crimereporter";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
		
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	// Global
	global $user;
	
	// Selecting User ID, check if user exists
	$sql = "SELECT * FROM User WHERE userEmail='".$userEmail."' AND userPass='".md5($userPass)."'";
	$result = mysqli_query($conn,$sql) or die("Error in $sql:" . mysqli_error($conn));
	while($row = mysqli_fetch_object($result))
	{
		$GLOBALS['user'] = $row->userAdmin;
	}
	
	$myObj->result = $GLOBALS['user'];
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	mysqli_close($conn);
	

?>