<?php
	// Connection
	$servername = "127.4.48.2";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";
	$dbname = "crimereporter";
	
	// Data From App
	$userEmail = isset($_GET["userEmail"]);
	$userPass = isset($_GET["userPassword"]);
	$userNo = isset($_GET["userNo"]);
	$userLati= isset($_GET["lati"]);
	$userLongi= isset($_GET["longi"]);
	$crimeType= isset($_GET["type"]);
	$crimeDesc= isset($_GET["desc"]);
	$crimeImg= isset($_GET["img"]);
	$ansa1 = isset($_GET["ansa1"]);
	$ansa2 = isset($_GET["ansa2"]);
	$ansa3 = isset($_GET["ansa3"]);
	$ansa4 = isset($_GET["ansa4"]);
	$userID = "";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	
	//Fetch User ID
	$mysql = "SELECT userID, FROM User WHERE userEmail = '".$userEmail."' and userPass = '".md5($userPass)."'";
	$result = mysqli_query($the_connection,$mysql);
	while($row = mysqli_fetch_object($result)) 
	{
	    $userID = $row->userID;	  
	}
	
	//Insert Into Report Table
	$sql = "INSERT INTO User_Report (userID, userLati, userLongi, crimeType, crimeDesc, crimeImg, userAns1, userAns2, userAns3, userAns4) VALUES ('".$userID."', '".$userLati."','".$userLongi."','".$crimeType."','".$crimeDesc."','".$crimeImg."','".$ansa1."','".$ansa2."','".$ansa3."','".$ansa4."')";
	if (!mysqli_query($the_connection, $sql)) 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($the_connection);
	}
	else
	{
		$myObj->result = "Crime reported";
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj."\n";
	
	mysqli_close($conn);
?>