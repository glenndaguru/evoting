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

	
	// List all locations
	$rows = array();
	$sql = "SELECT p.*, u.userNo as num 
			FROM User_Panic p, User u
			WHERE p.userID = u.userID";
	$result = mysqli_query($conn,$sql) or die("Error in $sql:" . mysqli_error($conn));	
	
	while($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	
	$myJobj = json_encode(array('Locations'=> $rows));
	echo $myJobj."\n";
	
	mysqli_close($conn);
	

?>