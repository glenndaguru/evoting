<?php
	// Connection
	$servername = "127.4.48.2";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";
	$dbname = "crimereporter";
	
	// Data From App
	$userEmail = $_POST["userEmail"];
	$userPass = $_POST["userPass"];
	$userLati= $_POST["lati"];
	$userLongi= $_POST["longi"];
	$crimeType= $_POST["type"];
	$crimeDesc= $_POST["desc"];
	$crimeImg= $_POST["img"];
	$ansa1 = $_POST["ansa1"];
	$ansa2 = $_POST["ansa2"];
	$ansa3 = $_POST["ansa3"];
	$ansa4 = $_POST["ansa4"];
	
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	// Global
	global $user;
	global $theDate;
	
	//Fetch User ID
	$sql = "SELECT * FROM User WHERE userEmail='".$userEmail."' AND userPass='".md5($userPass)."'";
	$result = mysqli_query($conn,$sql) or die("Error in $sql:" . mysqli_error($conn));
	while($row = mysqli_fetch_object($result))
	{
		$GLOBALS['user'] = $row->userID;
	}
	
	$theDate = date("Y-m-d") + date("h:i:sa")
	
	//Insert Into Report Table
	$mysql = 'INSERT INTO User_Report'.'(userID, userLati, userLongi, crimeType, crimeDesc, crimeImg, crimeDate, userAns1, userAns2, userAns3, userAns4)'.'VALUES ("'.$GLOBALS['user'].'", "'.$userLati.'","'.$userLongi.'","'.$crimeType.'", "'.$crimeDesc.'","'.$crimeImg.'","'.$theDate.'","'.$ansa1.'", "'.$ansa2.'","'.$ansa3.'","'.$ansa4.'")';
	if (!mysqli_query($conn, $mysql)) 
	{
		echo "Error: " . $mysql . "<br>" . mysqli_error($conn);
	}
	else
	{
		$myObj->result = "Crime Reported";
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	
	mysqli_close($conn);
?>