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
					<h2><?php echo $name; ?></h2> <a href='logout.php'>LogOut</a>
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
				
				
				
				<?php
				$id=$_GET["id"];
				$sql = "SELECT * FROM notice WHERE id='$id' ";
                $result = $conn->query($sql);

               if ($result->num_rows > 0) {
             // output data of each row
               while($row = $result->fetch_assoc()) {
					
                    echo '<div class="bar">';
					echo '<p>'.$row["title"].'</p>';
					echo '<div class="skills">
					 <div class="skill1" style="width:100%"> </div>							
				   </div>';
				    echo '<p>'.$row["post"].'</p>'; 
					echo '</div>';
                   
			   }
              
              }            else {
                   echo "0 results";
                     }
				?>
				<div>
				<table style="background: 2px; width: 87%; height: 57px; background-attachment: fixed;">
						<tr>
							<td style="width: 88px"><a href="fb.php?id=<?php echo $id."&un=".$user."&value=like"?>" ><P><img src='images/like.png'/></td>
							<td style="width: 29px">&nbsp;</td>
							<td style="width: 78px"><a href="fb.php?id=<?php echo $id."&un=".$user."&value=unlike"?>" ><P><img src='images/unlike.png'/></p></a></td>
						</tr>
					</table>
					</p></a>
				
				
				</div>
				
				
				
				
					
				
					
			</div>
			<div class="footer">
				<p>Copyright © 2015 Created By Shoaeb</p>
			</div>
		</div>
</body>
</html>