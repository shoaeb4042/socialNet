<?php
if(isset($_GET['id'])){
$id=$_GET["id"];
$un=$_GET["un"];
$value=$_GET["value"];
//echo $id;


include('mysql.php');

$i=check_value($conn,$id,$un);
if($i==0){
	insert($conn,$id,$un,$value);
	include('submit.php');
}
else{
	include('submit1.php');
	//echo "You have already give a feed back";
	
}


}
else{
	include('404.php');
}



?>