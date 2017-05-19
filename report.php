<?php
	// Global
	global $userID;
	// Connection
	$servername = "127.4.48.2";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";
	$dbname = "crimereporter";
	
	// Data From App
	$userEmail = $_POST["userEmail"];
	$userPass = $_POST["userPassword"];
	$userNo = "0128004527";//$_POST["userNo"];
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
	
	//Fetch User ID
	$mysql = "SELECT userID, FROM User WHERE userEmail = '".$userEmail."' and userPass = '"$userPass."'";
	$result = mysqli_query($conn,$mysql);
	if (mysqli_num_rows($result) > 0) 
	{
		while($row =  mysqli_fetch_assoc($result)) 
		{
			$GLOBALS['userID'] = $row["userID"];	  
		}
	}
	
	//Insert Into Report Table
	//$sql = "INSERT INTO User_Report (userID, userLati, userLongi, crimeType, crimeDesc, crimeImg, userAns1, userAns2, userAns3, userAns4) VALUES ("'.$GLOBALS['userID'].'", '".$userLati."','".$userLongi."','".$crimeType."','".$crimeDesc."','".$crimeImg."','".$ansa1."','".$ansa2."','".$ansa3."','".$ansa4."')";
	$sql = 'INSERT INTO User_Report'.'(userID, userLati, userLongi, crimeType, crimeDesc, crimeImg, userAns1, userAns2, userAns3, userAns4)'.'VALUES ("'.$GLOBALS['userID'].'", "'.$userLati.'","'.$userLongi.'","'.$crimeType.'", "'.$crimeDesc.'","'.$crimeImg.'","'.$ansa1.'", "'.$ansa2.'","'.$ansa3.'","'.$ansa4.'")';
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