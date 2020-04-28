<?php

session_start();

if(isset($_SESSION["un"])){
include("mysql.php");
    $un=$_SESSION["un"];
    $sql = "SELECT * FROM users WHERE un='$un'";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$name=$row['name'];
	$user=$row['un'];
	$mob=$row['mbl'];
	$email=$row['eml'];
	$tnotice=countN($conn);
	$memlist=countM($conn);
	$mess=inbox($conn,$un);
}
else
{
//header('location: 404.php');
}


?>
<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="UX Navy Profile Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<!-- main -->
		<div class="main">
			<div class="main-grid1">
				<div class="main-grid1-left">
					<img src="images/<?php echo $user.'.jpg'; ?>" alt=" " class="img-responsive" />
				</div>
				<div class="main-grid1-right">
					<h2><?php echo $name; ?></h2><a href='logout.php'>LogOut</a>
					<p>UserName: <?php echo $user; ?></p>
					<p>Mobile: <?php echo $mob; ?></p>
					<p>Email: <?php echo $email; ?></p>

				</div>
				<div class="clear"> </div>
			</div>
			<div class="main-grid2">
				<div class="main-grid2-left">
					<p>Notice<span><?php echo $tnotice ?></span></p>
				</div>
				<div class="main-grid2-left">
					<p>Members<span><?php echo $memlist ?></span></p>
				</div>
				<div class="main-grid2-left">
				
					<p><a href="inbox.php" >Inbox</a><span><?php echo $mess ?></span></p>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="main-grid3">
			
			     <form method="post" action="send1.php">
				 <textarea name="text"></textarea><br />
	             <input type='submit' name="Submit1" style="padding: 10px; color:black; font-size: large;"  value="SEND"/>
				 </form>
				<p>Inbox</p>
				<div class="skills">
					 <div class="skill1" style="width:100%"> </div>							
				</div>
				
				<?php
				$me=$_GET["id"] ;//or die("eror");
				$he= $_GET["to"] ;//or  die("eror");
				$_SESSION["me"]=$me;
				$_SESSION["he"]=$he;
				$sql = "SELECT * FROM inbox  where (un='$me' and who='$he') or (un='$he' and who='$me') ORDER BY id DESC  ";
                $result = $conn->query($sql);

               if ($result->num_rows > 0) {
             // output data of each row
                while($row = $result->fetch_assoc()) {
					
                    echo '<div class="bar">';
					echo '<p>'.$row["who"].'</p>';
					echo'Sent on: '.$row["time"];
					echo '<p>Messege: '.$row["mess"].'</p>';
					echo '</div>';
				
					echo '<div class="skills">
					 <div class="skill1" style="width:100%"> </div>							
				</div>';
              }
              }            else {
                   echo "0 results";
                     }
				?>
				
				
				
				
				
					
				
					
			</div>
			<div class="footer">
				<p>Copyright © 2015 Created By Shoaeb</p>
			</div>
		</div>
</body>
</html>