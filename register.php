<?php
	 ob_start();
	 session_start();
	 if( isset($_SESSION['user'])!="" ){
	     	header("Location: home.php");
	}
	include_once 'dbconnect.php';
  $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	$error = false;

	if ( isset($_POST['btn-signup']) ) {
		
		// clean user inputs to prevent sql injections
		$name = trim($_POST['name']);
		$name = strip_tags($name);
		$name = htmlspecialchars($name);
		
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
        
        $phone = trim($_POST['phone']);
		$phone= strip_tags($phone);
		$phone= htmlspecialchars($phone);
        
		$age = trim($_POST['age']);
		$age = strip_tags($age);
		$age = htmlspecialchars($age);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);

		$radio=$_REQUEST["r"];
		$checking=$_REQUEST["w"];
		
		
		// basic name validation
		if (empty($name)) {
			$error = true;
			$nameError = "Please enter your full name.";
		} else if (strlen($name) < 3) {
			$error = true;
			$nameError = "Name must have atleat 3 characters.";
		} else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
			$error = true;
			$nameError = "Name must contain alphabets and space.";
		}
		
		//basic email validation
		if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		} else {
			// check email exist or not
			$query = "SELECT userEmail FROM users WHERE userEmail='$email'";
			$result = mysqli_query($conn,$query);
			$count = mysqli_num_rows($result);
			if($count!=0){
				$error = true;
				$emailError = "Provided Email is already in use.";
			}
		}
        
        
        	if (empty($phone)){
			$error = true;
			$phoneerror = "Please enter phone number.";
		} else if(strlen($phone) <11) {
			$error = true;
			$phonerror = "phone number must be 11 numbers";
		}
        
        
          	if (empty($age)){
			$error = true;
			$ageerror = "Please enter your age";
		} else if(strlen($age) >4) {
			$error = true;
			$ageerror = "please enter correct age";
		}
        
        
		// password validation
		if (empty($pass)){
			$error = true;
			$passError = "Please enter password.";
		} else if(strlen($pass) < 6) {
			$error = true;
			$passError = "P`assword must have atleast 6 characters.";
		}
	
		// password encrypt using SHA256();
		$password =  $pass;
		$password = hash('sha256', $pass);
		
		// if there's no error, continue to signup

        
        
      
        if( !$error ) {
           
          
         
			$query = "INSERT INTO users(userName,userEmail,userPass,userage,userphone,gender,job) VALUES('$name','$email','$password',$age,$phone,'$radio','$checking')";
			$res = mysqli_query($conn,$query);
                 }
             
				
			if ($res) {
				$errTyp = "success";
				$errMSG = "Successfully registered, you may login now";
				unset($name);
				unset($email);
				unset($pass);
				

       echo '<script type="text/javascript">
       window.location = "home.php"
      </script>';
			} else {
				$errTyp = "danger";
				$errMSG = "Something went wrong, try again later...";	
			}	
				
		}
		
		
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fitness System</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <head>
        <style>
            body{
         background-image:url(assets/images/banner.jpg);
         background-repeat:no-repeat;
         background-size:cover;
            }
        </style>
    </head>
<div class="container">
    <h1 style="text-shadow: 1px 1px #FF0000;"><center><span style="text-shadow: 1px 1px aqua;  text-decoration: underline;text-decoration: overline; ;font-weight: bold;"> W</span>elcome to fitness App </center></h1>
	<div id="login-form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        
        	<div class="form-group">
            	<h2 class="">Sign Up.</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $name ?>" />
                </div>
                <span class="text-danger"><?php echo $nameError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
           
               
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
            	<input type="number" name="phone" class="form-control" placeholder="Enter your phone" maxlength="11" />
                </div>
                <span class="text-danger"><?php echo $phoneerror; ?></span>
            </div>
            
                 <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
            	<input type="number" name="age" class="form-control" placeholder="Enter your Age" maxlength="3" />
                </div>
                <span class="text-danger"><?php echo $ageerror; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
         
                    
          
            
           
          <div class="form-group">
            	<div class="input-group">
            
                    <h4>Gender</h4>

             <input type="radio" name="r" value="male" checked> Male
             <input type="radio" name="r" value="female"> Female<br> 
             <?php

                   echo $radio;
             ?>
                </div>
                <span class="text-danger"></span>
            </div>



            <div class="form-group">
            	<div class="input-group">
            
                    <h4>I am</h4>

             <input type="radio" name="w" value="users" checked> user
             <input type="radio" name="w" value="doctors"> doctor<br>
             <input type="radio" name="w" value="pysicians"> pysician 
           <br>
                </div>
                <span class="text-danger"></span>
            </div>








            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
                <h2 style="color:#FFF"><a style="color:white"href="index.php">>>>Sign in Here...</a></h2>
            </div>
        
        </div>
   
    </form>
    </div>	

</div>

</body>
</html>
<?php ob_end_flush(); ?>