<!DOCTYPE html>
<?php include('mysql.php');?>
<html>
<head>
<title>Admin</title>
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
	<p><br></p>
	<!-- main -->
		<div class="main">
			<h1>Admin</h1>
			<div class="main-grid1">
			<form action='pub.php' method='post'>
								<div class="main-grid1-right">
								Title:<br>
									<input name="title" type="text" style="width: 247px; height: 31px" />
									</div>
				<div class="clear"> 
					
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Notice:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
					
						<textarea name="text" style="width: 252px; height: 54px"></textarea></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								
									<input name="Submit1" type="submit" value="Publish" style="width: 251px; height: 38px; background-color: #008000; color: #FFFFFF; font-size: medium;">
								</div>
								</form>
			</div>
			<div class="main-grid2">
				<div class="main-grid2-left">
					<p>Notice</p>
				</div>
				<div class="main-grid2-left">
					<p><a href="mem.php" >Members</a></p>
				</div>
				<div class="main-grid2-left">
					<p><a href="inbox.php" >Inbox</a></p>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="main-grid3">
			
			     <form method="post" action="send.php">
				 <select name="to">
			     <?php replay($conn);
				 ?>
	             </select><br />
				<textarea name="text"></textarea><br />
	           <input type='submit' name="Submit1" style="padding: 10px; color:black; font-size: large;"  value="SEND"/>
				</form>
				<p>Inbox</p>
				<div class="skills">
					 <div class="skill1" style="width:100%"> </div>							
				</div>
				
				<?php
				
				$sql = "SELECT * FROM inbox  where un='Admin' or who='Admin' ORDER BY id DESC LIMIT 25  ";
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