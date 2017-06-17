<?php

	ob_start();
	session_start();
	require_once '../../dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	// select loggedin users detail
	$res=mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysqli_fetch_array($res);
?>

<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
	
.banner-right-img{
    float: right;
    width: 30%;
    height: 90px
   
}
img{

	border-radius: 30px
}
</style>
<title>My profile</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <!---- start-smoth-scrolling---->
 
 <!---- start-smoth-scrolling---->
</head>
	<body>
		<!-- container -->
			<!-- header -->
			<div id="home" class="header">
				<div class="container">
				<!-- top-hedader -->
				<div class="top-header">
					<!-- /logo -->
					<!--top-nav---->
					<div class="top-nav">
					<div class="navigation">
					<div class="logo">
						<h1><a href="index.html"><span style="color: red">My </span > Profile </a></h1>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- /top-hedader -->
				</div>
			<div class="banner-info">
				<div class="col-md-7 header-right">
					<h1>Hi !</h1>
					<h6><?=$_SESSION['userName'] ?></h6>
					<ul class="address">
						<span style="margin-left="10px">
					
<div class="banner-right-img">
						
				
					<?php
				
                  
              if ( $userRow['gender']=="male"){
                  echo "<img width=\"140px\"src=\"images/boy.jpg\">";
              } else if($userRow['gender']=="female") {
                echo "<img  width=\"120px\" src=\"images/girle.jpg\">";
              }
                ?>
                 </span>
                 </div>
					<li>
							<ul class="address-text">
								<li><b>NAME</b></li>
								<li><?php echo $userRow['userName']; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>Gender</b></li>
								<li><?php echo $userRow['gender']; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>PHONE </b></li>
								<li><?php echo $userRow['userphone']; ?></li>
							</ul>
						</li>
				
						
						<li>
							<ul class="address-text">
								<li><b>E-MAIL </b></li>
								<li><a href="mailto:example@mail.com">  <?php echo $userRow['userEmail']; ?></a></li>
							</ul>
						</li>
						<li>
							
						</li>
						
					</ul>
				</div>
				
				<div class="clearfix"> </div>
						
		      </div>
		      		<a style="background: yellow"href="../../home.php">press to Back to Home</a>

			</div>
		</div>
	</div>
		<br>
		<br/>
		<div style="background-color:black">
			<p style="color:white; margin-left:35%;">@All rights reseved -- designed and developed by Fitness App  </p>
		</div>
	</body>
</html>

