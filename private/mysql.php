<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "code71";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//PDO('mysql:host=localhost;dbname=code71;charset=utf8', 'root', '');
//mysqli("SET CHARACTER SET utf8");
//mysql_query("SET SESSION collation_connection =’utf8_general_ci'");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function countN($conn){
	
	$sql = "SELECT * FROM notice  ";
    $result = mysqli_query($conn, $sql);
    $co=mysqli_num_rows($result);
	return $co;
}
function countM($conn){
	
	$sql = "SELECT * FROM users  ";
    $result = mysqli_query($conn, $sql);
    $co=mysqli_num_rows($result);
	return $co;
}
function inbox($conn,$un){
	
	$sql = "SELECT * FROM inbox where un='$un'  ";
    $result = mysqli_query($conn, $sql);
    $co=mysqli_num_rows($result);
	return $co;
}

function check_value($conn,$id,$un){
	$sql = "SELECT * FROM fb WHERE id=$id and un='$un'  ";
    $result = mysqli_query($conn, $sql);
    $co=mysqli_num_rows($result);
	return $co;
	
}
function insert($conn,$id,$un,$value){
		
		$sql = "INSERT INTO fb (id, un,ans,date)
		VALUES ($id, '$un', '$value',NOW())";
		
		if (mysqli_query($conn, $sql)) {
			//echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		}

		
		function replay($conn){
			
			    $sql = "SELECT * FROM users  ";
                $result = $conn->query($sql);

               if ($result->num_rows > 0) {
             // output data of each row
                while($row = $result->fetch_assoc()) {
					
					
					echo '<option value="'.$row["un"].'">'.$row["un"].'</option>';
                    
					
					
              }
              }
		}

?>