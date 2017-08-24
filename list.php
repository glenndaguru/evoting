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
	
	// Select all crimes 
	$rows = array();
	$sql = "SELECT * 
			FROM User_Report";
	$result = mysqli_query($conn,$sql) or die("Error in $sql:" . mysqli_error($conn));	
	
	while($row = mysqli_fetch_assoc($result)) 
	{
		$rows[] = $row;
	}
	
	$myJobj = json_encode(array('Crimes'=> $rows));
	echo $myJobj."\n";
	
	
	mysqli_close($conn);
	

?>

SELECT R.*,U.userName
FROM user_report R, user u
WHERE u.userID = r.userID;