<?php
	include(dbConnection.php);
	
	// Connection
	$servername = "127.4.48.2";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";
	$dbname = "crimereporter";
	
	// Variable
	$userName = "Noise";
	$userEmail = "Noise@gmail.com";
	$userPass = "Noise";
	$userNo = "0128004527";

	// Create connection
	$conn = new mysqli($servername, $username, $password);
	mysqli_select_db($dbname,$conn);
	
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = 'INSERT INTO User'.'(userName, userEmail, userPass, userNO)'.'VALUES ("'.$userName.'", "'.$userEmail.'","'.md5($user_passwordhash).'","'.$userNo.'")';
	if (!mysqli_query($conn, $sql)) 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	else
	{
		$myObj->result = "User succesfully registered";
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj;
	
	mysqli_close($conn);
	
?>