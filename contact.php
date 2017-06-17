<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
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
<!DOCTYPE html>
<html>
<head> 
	<title>Contact US</title>
	<link rel="stylesheet" href="contact_style.css">
    	<link rel="stylesheet" href="style.css">
    	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
       <link rel="stylesheet" href="assets/css/bootstrap.min.css">
       
    
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300italic,300,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
	<!-- For-Mobile-Apps-and-Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Classy Contact Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //For-Mobile-Apps-and-Meta-Tags -->	
</head>
<body>
	<div class="container">
        	<nav class="navbar navbar-default navbar-fixed-top">
     
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Fitness App</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <li><a href="home.php">Our service</a></li>
            <li><a href="contact.php">Contact US</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div>
                <!--/.nav-collapse -->
    
    </nav>
        
        <h1><mark><bold>Contact Us Mr . <?php echo $userRow['userName']; ?> for any service</bold></mark></h1>
		<div class="left-w3">
			<h2>Contact Us!</h2>
			<form action="process.php" method="post">
				<div class="agile1">
					<h3>Name</h3>
					<input type="text" name="name"readonly class="name" value="<?php echo $userRow['userName']; ?>" placeholder="" required="">
                </div>
				
				<div class="agile1">
					<h3>Email</h3>
					<input type="text" name="email"readonly class="email" value="<?php echo $userRow['userEmail']; ?>" placeholder="" required="">
				</div>
				<div class="agile1">
					<h3>Message</h3>
					<textarea  name="message" placeholder=""  required=""></textarea>
				</div>	
				<input type="submit" value="Send Message">
			</form>
		</div>
		<div class="right-w3ls">
		
			<h3 class="w3ls">Our Location</h3>
			<div class="agile1">
				<h3>Reach Us</h3>
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.9503398796587!2d-73.9940307!3d40.719109700000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1441710758555"></iframe>
				</div>	
			</div>
			<h3 class="w3ls">Stay In Touch</h3>
			<div class="agile1">
				<h3>Social Icons</h3>
				<div class="socialicons w3">
					<ul>
						<li><a class="facebook" href="#"></a></li>
						<li><a class="twitter" href="#"></a></li>
						<li><a class="google" href="#"></a></li>
						<li><a class="pinterest" href="#"></a></li>
						<li><a class="linkedin" href="#"></a></li>
					</ul>
				</div>
			</div>
			<div class="footer-w3l">
				<p class="agileinfo"> &copy; 2017 @fitness App . All Rights Reserved | Design by <a href="http://w3layouts.com">Fitness App</a></p>
			</div>
		</div>
		<div class="clear"></div>	
	</div>
        <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>