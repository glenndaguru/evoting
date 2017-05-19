<?php
	// Data From App
	$userEmail = "awe@cs.q";
	$userPass = "1234";
	
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
	
	// Selecting User ID, check if user exists
	$sql = "SELECT UserID FROM User";
	//$sql = "SELECT UserID FROM User WHERE userEmail='".$userEmail."' AND userPass='".$userPass."'";
	$result = mysqli_query($sql, $conn) or die("Error in $sql:" . mysqli_error($conn));	
	if(mysqli_num_rows($results) != 0)
	{
		$myObj->result = 1;
	}
	else
	{
		$myObj->result = 0;
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	echo $userEmail."\n";
	echo $userPass."\n";
	
	mysqli_close($conn);
	

?>