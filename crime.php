<?php
	// Data From App
	$crimeID = $_POST["crimeID"];
	
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
	
	// Select all crimes 
	$rows = array();
	$sql = "SELECT r.*, u.userName
			FROM User_Report r, User u
			WHERE r.userID = u.userID
			AND r.repo_no ='".$crimeID."'";
	$result = mysqli_query($conn,$sql) or die("Error in $sql:" . mysqli_error($conn));	
	
	while($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	
	$myJobj = json_encode(array('Crimes'=> $rows));
	echo $myJobj."\n";
	
	
	mysqli_close($conn);
	

?>