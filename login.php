<?php
	include(dbConnection.php);
	
	$userEmail = isset($_GET["userEmail"]);
	$userPass = isset($_GET["userPassword"]);

	$sql = mysqli_query($the_connection,"SELECT userID, FROM User WHERE userEmail = $userEmail and userPass = $userPass");
	if(mysqli_num_rows($sql) > 0)
	{
		$myObj->result = 1;
	}
	else
	{
		$myObj->result = 0;
	}
	
	$myJobj = json_encode($myObj);
	echo $myJobj;

?>