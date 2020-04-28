<?php
if(isset($_POST["to"])){
include('mysql.php');
$un=$_POST['to'];
$mess=$_POST['text'];
$who="Admin";
$sql = "INSERT INTO inbox (un,mess,who,time) VALUES ('$un', '$mess', '$who',NOW())";
		
		if (mysqli_query($conn, $sql)) {
			header('location: inbox.php');
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}


}
?>