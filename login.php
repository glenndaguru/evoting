<?php
	// Connection
	$servername = "127.4.48.2";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";
	$dbname = "crimereporter";
	
	// Data From App
	$userEmail = isset($_GET["userEmail"]);
	$userPass = isset($_GET["userPassword"]);
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
		
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	// Selecting User ID, check if user exists
	$sql = "SELECT userID, FROM User WHERE userEmail = '".$userEmail."' and userPass = '".md5($userPass)."'";
	$results = mysqli_query($the_connection,$sql);
	if(mysqli_num_rows($results) > 0)
	{
		$myObj->result = 1;
	}
	else
	{
		$myObj->result = 0;
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	
	mysqli_close($conn);
	

?>