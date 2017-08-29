<?php
	// Data From App
	$userEmail = $_POST["userEmail"];
	$userPass = $_POST["userPass"];
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
	
	// Global
	global $user;
	
	//Fetch User ID
	$sql = "SELECT * FROM User WHERE userEmail='".$userEmail."' AND userPass='".md5($userPass)."'";
	$result = mysqli_query($conn,$sql) or die("Error in $sql:" . mysqli_error($conn));
	while($row = mysqli_fetch_object($result))
	{
		$GLOBALS['user'] = $row->userID;
	}
	
	//Insert Into Panic Table
	$mysql = 'INSERT INTO User_Panic'.'(userID,panicLati, panicLongi)'.'VALUES ("'.$GLOBALS['user'].'","'.$userLati.'","'.$userLongi.'")';
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