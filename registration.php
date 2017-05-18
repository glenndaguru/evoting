<?php
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
	
	// Data From App
	$userName = $_GET["userName"];
	$userEmail = $_GET["userEmail"];
	$userPass = $_GET["userPassword"];
	$userNo = $_GET["userNo"];
	
	// Insert Into User Table
	$sql = 'INSERT INTO User'.'(userName, userEmail, userPass, userNO)'.'VALUES ("'.$userName.'", "'.$userEmail.'","'.md5($userPass).'","'.$userNo.'")';
	if (!mysqli_query($conn, $sql)) 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	else
	{
		$myObj->result = "User succesfully registered";
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	
	mysqli_close($conn);
?>