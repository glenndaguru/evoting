<?php
	$servername = "127.4.48.2";
	$username = "adminD35M7Lk";
	$password = "M1iBd32D8Hdt";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
	mysqli_close($conn);
?>