<?php
	// Data From App
	$userLati= $_POST["lati"];
	$userLongi= $_POST["longi"];
	
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
	else
	{
		echo "Connected";
	}
	
	
	//Insert Into Report Table
	$mysql = 'INSERT INTO User_Panic'.'(panicLati, panicLongi)'.'VALUES ("'.$userLati.'","'.$userLongi.'")';
	if (!mysqli_query($conn, $mysql)) 
	{
		echo "Error: " . $mysql . "<br>" . mysqli_error($conn);
	}
	else
	{
		$myObj->result = "Panic Reported";
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	
	mysqli_close($conn);
	

?>