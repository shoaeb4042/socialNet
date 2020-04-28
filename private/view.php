<?php
$id=$_GET["id"];

?>


<!DOCTYPE html>
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
			
			<div class="main-grid2">
				<div class="main-grid2-left" style="width: 29%; height: 16px">
					<p>&nbsp;</p>
				</div>
			</div>
			<div class="main-grid3">
			<p>All important Notice </p>
				<div class="skills">
					 <div class="skill1" style="width:100%"> </div>							
				</div>
				
				<?php
				include('mysql.php');
				$sql = "SELECT * FROM fb where id=$id ORDER BY id DESC   ";
                $result = $conn->query($sql);

               if ($result->num_rows > 0) {
             // output data of each row
                while($row = $result->fetch_assoc()) {
					
                    echo '<div class="bar">';
					echo '<p>'.$row["un"].'</p>';
					echo'Seen time: '.$row["date"].'<br>';
					echo'Feedback: '.$row["ans"];
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
				<p>Copyright © 2015 | Design by Shoaeb</p>
			</div>
		</div>
</body>
</html>
