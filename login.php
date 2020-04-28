<?php


if(isset($_POST['userid']) && isset($_POST['psw']) && !empty($_POST['psw'])){
include('mysql.php');

$user=$_POST['userid'];
$pss=$_POST['psw'];
//echo $user.$pss;

if($user=="admin" && $pss=="022123"){


header('location: admin.php');
}
else{
	$sql = "SELECT * FROM users WHERE un='$user' and pas='$pss' ";
    $result = mysqli_query($conn, $sql);
    $co=mysqli_num_rows($result);
	if($co==1){
		session_start();
		$_SESSION["un"]=$user;
		header('location: user/profile.php');
		
	}
	else{
		header('location: 404.php');
	}
	
}

$conn->close();

}
else{
header('location: index.php');
}

?>