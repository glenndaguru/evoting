<?php
	include(dbConnection.php);
	
	$userName = "Noise";
	$userEmail = "Noise@gmail.com";
	$userPass = "Noise";
	$userNo = "0128004527";
	$myObj->result = "User succesfully registered";
	$myJobj = json_encode($myObj);
	
	$sql = "INSERT INTO User (userName, userEmail, userPass, userNO) VALUES ($userName, $userEmail, md5($user_passwordhash),$userNo)";
	if (!mysqli_query($the_connection, $sql)) 
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($the_connection);
	}
	else
	{
		echo $myJobj;
	}
	
?>