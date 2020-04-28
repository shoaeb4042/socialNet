<?php

if(isset($_POST["text"])){
	include('mysql.php');
	$t=$_POST["title"];
	$p=$_POST["text"];
	
	$sql = "INSERT INTO notice (title,post,date) VALUES ('$t', '$p',NOW())";
		
		if (mysqli_query($conn, $sql)) {
			header('location: admin.php');
		} 
	
	
	
}
?>