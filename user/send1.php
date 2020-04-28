<?php
session_start();
if(isset($_SESSION["un"])){
include('mysql.php');
$un=$_SESSION["he"];
$mess=$_POST['text'];
$who=$_SESSION["me"];
$sql = "INSERT INTO inbox (un,mess,who,time) VALUES ('$un', '$mess', '$who',NOW())";
		
		if (mysqli_query($conn, $sql)) {
			$head='location: mess.php?id='.$who.'&to='.$un;
			header("$head");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}


}

?>