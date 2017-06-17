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
  
    $name=$userRow['userName'];
    $email=$userRow['userEmail'];
    $message=$_REQUEST['message'];
    
//      Inserting Data
     $sql="INSERT INTO `contact` ( `userName`, `userEmail`, `message`) VALUES ( '$name', '$email', '$message');";
     $query=mysqli_query($conn,$sql);
     

?>
<html>
    <head>
          <link rel="stylesheet" href="assets/css/w3.css" type="text/css" />
        <style>
            
    body {
    background-image: url("assets/images/banner.jpg");
    background-color: #cccccc;
         }
        </style>
    </head>
    
      <div style="float:center">
          <br><br><br><br><br>
          <h1><center>Your Message is <span style="color:aqua">recorded</span> sucessfully ! </center></h1>
           
          <div class="w3-container">
              <a href="home.php"><p><button class="w3-button w3-block w3-teal">Return To Home </button></p>   </a>
          </div>
          
          
        </div>

    </body>
</html>
