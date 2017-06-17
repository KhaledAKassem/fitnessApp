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
<?php
$k=$_POST['kg'];
$m=$_POST['m'];
$cm=$m/100;
$out=$k/($cm*$cm);

// UPDATE table_name
// SET column1 = value1, column2 = value2, ...
// WHERE condition; 

$query = "UPDATE users SET bmi_table ='$out' WHERE userId=".$_SESSION['user'];
$res = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html>
<head>
<style>
   @import url("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

.ta5 {
  border: 1px solid aqua;
  border-radius: 10px;
  height: 30px;
  width: 230px;
  border-right: : #646464 ;
  border-top: : #646464;    
  border-left: : #646464;
  border-bottom: : #646464;
  margin-left: 100px;
  border-right: 200px 
}

h5
{
    font-size:1.5rem;
    text-decoration: underline;
}
.footer
{
    font-family: "Roboto", sans-serif;
    line-height: 1.6;
    background-color:#216910;
    color:#ACFF99;
    font-size:1.2rem;
}

.footer  ul {
    list-style-type:none;
}

.footer a
{
    color:#fff;
}
.footer a:hover
{
    color:#fff;
}

.footer .widget_nav_menu ul li::before {
    position: relative;
    padding-right: 20px;
    content: "\f178";
    font-family: "FontAwesome";
   /* color: rgba(255, 255, 255, 0.15); */
    font-size: 12px;
}
.appoint
{
    margin:2rem 0 2rem 0;
}
.bottom-footer .fa
{
    font-size:2.5rem;
    padding:.7rem;
}


</style>
<script type="text/javascript">
function add(type) {

  //Create an input type dynamically.
  var element = document.createElement("input");

  //Assign different attributes to the element.
  element.setAttribute("type", type);
  element.setAttribute("value", type);
  element.setAttribute("name", type);


  var foo = document.getElementById("fooBar");

  //Append the element in page (in span).
  foo.appendChild(element);

}
</script>
      <title>Fitness App</title>
      
<script type="text/javascript" src="assets/jquery-1.3.2.min.js"></script>
      <script type="text/javascript">
        
   //---------------------Get Calrious Function----------------//
 function getcalrious(){
      var apple=parseFloat(document.getElementById('apple').value);
      var apple_calrios=apple*80;
      var banna=parseFloat(document.getElementById('banna').value);
      var banna_calirous=banna*101;

      var grape=parseFloat(document.getElementById('grape').value);
      var grape_calirous=grape*2;

      var mango=parseFloat(document.getElementById('mango').value);
      var mango_calirous=mango*135;

      var orange=parseFloat(document.getElementById('orange').value);
      var orange_calirous=orange*71;

      var peach=parseFloat(document.getElementById('peach').value);
      var peach_calirous=peach*2;

      var calrios=banna_calirous+apple_calrios+grape_calirous+mango_calirous+orange_calirous+peach_calirous;
      var out=calrios+" "+"Calrious";


       document.getElementById('show').value=out;

        }


    //get two 
     function getcalrious1(){
      var apple1=parseFloat(document.getElementById('apple1').value);
      var apple_calrios1=apple1*80;
      var banna1=parseFloat(document.getElementById('banna1').value);
      var banna_calirous1=banna1*101;

      var grape1=parseFloat(document.getElementById('grape1').value);
      var grape_calirou1=grape1*2;

      var mango1=parseFloat(document.getElementById('mango1').value);
      var mango_calirous1=mango1*135;

      var orange1=parseFloat(document.getElementById('orange1').value);
      var orange_calirous1=orange1*71;

      var peach1=parseFloat(document.getElementById('peach1').value);
      var peach_calirous1=peach1*2;

      var calrios1=banna_calirous1+apple_calrios1+grape_calirous1+mango_calirous1+orange_calirous1+peach_calirous1;
      var out1=calrios1+" "+"Calrious";


       document.getElementById('show1').value=out1;

        }    

        //get clairous 2


         function getcalrious2(){
      var apple2=parseFloat(document.getElementById('apple2').value2);
      var apple_calrios2=apple2*80;
      var banna2=parseFloat(document.getElementById('banna2').value);
      var banna_calirous2=banna2*101;

      var grape2=parseFloat(document.getElementById('grape2').value);
      var grape_calirous2=grape2*2;

      var mango2=parseFloat(document.getElementById('mango2').value);
      var mango_calirous2=mango2*135;

      var orange2=parseFloat(document.getElementById('orange2').value);
      var orange_calirous2=orange2*71;

      var peach2=parseFloat(document.getElementById('peach2').value);
      var peach_calirous2=peach2*2;

      var calrios2=banna_calirous2+apple_calrios2+grape_calirous2+mango_calirous2+orange_calirous2+peach_calirous2;
      var out2=calrios2+" "+"Calrious";


       document.getElementById('show2').value=out2;

        }




   //---------------------End GetCarious Function--------------//
       
        function getbmi(){
            var kg=parseFloat(document.getElementById('kg').value);
            var m=parseFloat(document.getElementById('m').value);
            var m_cm=m/100;
            var bm=parseFloat(kg/(m_cm*m_cm));
            var bmi= Math.round(bm);
            document.getElementById('result').value=bmi;

            if(bmi<16){
              document.getElementById('result2').value="you are severe thiness";  
            }
            else if(bmi>=16 && bmi<17){
                 document.getElementById('result2').value="you are Moderate thiness";
                
            }
            else if(bmi>=17 && bmi<18.5){
                 document.getElementById('result2').value="you are Mid Thiness";
            }
            else if(bmi>=18.5 && bmi<25){
                 document.getElementById('result2').value="you are Normal";
            }
            else if(bmi>=25 && bmi<30){
                 document.getElementById('result2').value="you are overWeight";
            }
            else if(bmi>=30 && bmi<35){
                 document.getElementById('result2').value="you are obese class1";
            }
            else if(bmi>=35 && bmi<40){
                 document.getElementById('result2').value="you are obese class 11";
            }
            else if(bmi >40){
                 document.getElementById('result2').value="you are obses class 111";
            }
            else{
                 document.getElementById('result2').value="Your enter is error try again ";
            }

   

                
        }
       </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/w3.css" type="text/css" />
    
    
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
          </button>
           <p class="navbar-brand" href="#"><span style="color:red; font-size:"40px">F</span>itness App</p>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
        
            <li><a href="home.php">Our service</a></li>
             <li><a href="profiles/user/index.php">My Profile</a></li>
            <li><a href="contact.php">Contact US</a></li>
            <li>      &nbsp&nbsp&nbsp&nbsp 
                           &nbsp&nbsp&nbsp&nbsp     &nbsp&nbsp&nbsp&nbsp     &nbsp&nbsp&nbsp&nbsp
                &nbsp&nbsp&nbsp&nbsp </li>
            <li> 
                   
                <?php
     if($userRow['job']=="doctors"){
                echo "<h5> Job : Doctor</h5>";
              }
     else if($userRow['job']=="pysicians"){
               echo "<h5> Job : pysician</h5>";
     }  

     else 
                
                ?> </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
           

       
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class=""></span>
      

         <?php
                  
              if ( $userRow['gender']=="male"){
                  echo "<img width=\"40px\"src=\"assets/images/red.jpg\">";
              } else if($userRow['gender']=="female") {
                echo "<img  width=\"60px\" src=\"assets/images/blue.jpg\">";
              }


                ?>
              

        &nbsp;Hi' <?php echo $userRow['userName']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout">
                
                &nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

	<div id="wrapper">

	<div class="container">
    
    	<div class="page-header">
    	<h3>Test Your Fitness Now </h3>
    	</div>
     <div style="width:50%;float:left">   
   <h4><mark>Note !! Your age we take it with our calculation of(BMI)
<br><br>
 get it from your profile to keep you write less </mark></h4>
   <br>
   <br>
<div class="w3-container w3-blue">
   
  <h2><center>Calculate BMI<center></h2>
      
</div>
<br>
      
<form class="w3-container" name="myform" action="home.php" method="post">
  <p>
  <label>Enter Your Weight in Kilogram(kg)</label>
  <input class="w3-input" type="text" id="kg" name="kg"></p>
  <p> 
  <label>Enter Your Height in (cm) like 185 cm </label>
  <input class="w3-input" type="text" id="m" name="m"></p>
  <p>
  <input class="w3-input" id="bmi" type="button" name="bmi" value="show BMI for testing only " onclick="getbmi()" ></p>
  <input class="w3-input" id="bmi" type="submit" name="bmi" value="save BMI for further quering" ></p>
  
  <input class="w3-input" type="text" id="result" name="result" readonly  value="Your Result (BMI) will Appear here">
 
   <?php

  $last_view=mysqli_query($conn,"SELECT bmi_table FROM users WHERE userId=".$_SESSION['user']);
     echo "your last view"+ $last_view ;   
  ?>
  <input class="w3-input" type="text" id="result2" readonly  value="Your range is here">


 
</form>
      
        </div>
      
    <div style="width:45%;float:right;font-size:20px;border: 3px solid red; padding:10px">
        <h3><bold><mark>The ranges to know where you are</mark> </bold></h3>
  <table class="cinfoT" ;">
    <tr><td class="cinfoHd">Category   </td><td class="cinfoHdL">   &nbsp;&nbsp; BMI range - kg/m<sup>2</sup></td></tr>
	<tr><td>Severe Thinness      </td><td class="cinfoBodL">&nbsp;&nbsp;&nbsp;&lt;      16</td></tr>
	<tr><td>Moderate Thinness</td><td class="cinfoBodL"> &nbsp;&nbsp;  16 - 17</td></tr>
	<tr><td>Mild Thinness</td><td class="cinfoBodL"> &nbsp;&nbsp;  17 - 18.5</td></tr>

	<tr><td>Normal</td><td class="cinfoBodL">  &nbsp;&nbsp;  18.5 - 25</td></tr>
	<tr><td>Overweight</td><td class="cinfoBodL">&nbsp;&nbsp;   25 - 30</td></tr>
	<tr><td>Obese Class I</td><td class="cinfoBodL">  &nbsp;&nbsp; 30 - 35</td></tr>
	<tr><td>Obese Class II</td><td class="cinfoBodL">   &nbsp;&nbsp;   35 - 40</td></tr>
	<tr><td>Obese Class III</td><td class="cinfoBodL">  &nbsp;&nbsp; &gt; 40</td></tr>
</table>
   <br>
    </div>
    </div>

    </div>
    <br><br><br>
    <center>
    <div style="width: 900px;height: 2000px">

   <h1 style="background: aqua ; border-radius: 10px">Your BreakFast</h1>
   <br>
       <div style=" border-style: dashed;
    border-color: green; width: 800px;height: 300px">
    <br><br>
        <form> 
        <span style="background: ;font-size: 20px"> quantity for Apple </span>&nbsp &nbsp &nbsp   <input class="ta5" type="number" id="apple" name="apple">cup  
        <br>


        <span style="background: ;font-size: 20px">quantity for Bannana</span>  &nbsp &nbsp  <input class="ta5"type="number" id="banna" name="banna"> cup 
        <br>


        <span style="background: ;font-size: 20px">quantity for Grape  </span>  &nbsp&nbsp&nbsp&nbsp&nbsp  <input class="ta5" type="number" id="grape" name="Grape"> cup 
        <br>


        <span style="background: ;font-size: 20px">quantity for Mango </span> &nbsp &nbsp &nbsp <input class="ta5" type="number" id="mango" name="mango"> cup 
        <br>


        <span style="background: ;font-size: 20px">quantity for Orange </span> &nbsp &nbsp <input class="ta5" type="number" id="orange" name="orange">cup  
        <br>
        <span style="background: ;font-size: 20px">quantity for Peach </span> &nbsp &nbsp &nbsp <input class="ta5" type="number" id="peach" name="peach"> cup 
        <br>
        <br>
        <br>
        <button type="button" onclick="getcalrious()" name="submit" class="btn btn-primary">Get Calarious Now</button>
        <input type="text" name="show" value="my radius with calarios" id="show" readonly="true">

</form>


</div>
<br><br><br>
    
<!-- <-------------------------------------------------------------> -->
   





        <!-- Food Taken part>     -->



  



        <!--  End Food Taken Part -->



       
       
   </div>
   </center>
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <br>
      <footer class="footer">
    <div class="main-footer" data-pg-collapsed>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="widget w-footer widget_black_studio_tinymce">
                       <br> <br>
                        <h6 class="widget-title"><span class="light">About</span> Us</h6>
                        <div class="textwidget">Our Fitness App
                        This System care of your health and also follow you health 
                          <div class="col-xs-12 appoint">
                            <a href="http://twitter.com" class="btn btn-primary" target="_blank">Follow us on  Twiter</a>
                          </div>  
                                    
                            
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="widget w-footer widget_nav_menu">
                    <br><br>
                        <h6 class="widget-title"><span class="light">
                        Our</span> Services</h6>
                        <div class="menu-footer-menu-container">
                            <ul id="menu-footer-menu" class="menu">
                    <li id="menu-item-6694" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6694">
                    <a href="#">Measure Your BMI</a>
                         <!-- -->
                    </li>
                    <li id="menu-item-6696" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6696">
                    <a href="#">Measure your calarios</a>
                         <!-- -->
                    </li>
                    <li id="menu-item-6692" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6692">
                    <a href="#">Advices about how to be fit </a>
                        <!-- -->
                    </li>
                    <li id="menu-item-6695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6695">

                    <a href="#">dynamicaly testes and analysis your data</a> 
                         <!-- -->
                    </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="widget w-footer widget_nav_menu">
                    <br><br>
                        <h6 class="widget-title"><span class="light">Our</span> Services</h6>
                        <div class="menu-services-menu-container">
                            <ul id="menu-services-menu" class="menu">
                                <li id="menu-item-6684" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6684">
                                    <a href="#">Wait us</a>
                                </li>
                               
                              
                                <li id="menu-item-6687" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6687">
                                    <a href="#">Wait us</a>
                                </li>
                                <li id="menu-item-6688" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6688">
                                    <a href="#">Wait us</a>
                                </li>
                                <li id="menu-item-6689" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6689">
                                    <a href="#">Wait us</a>
                                </li>
                                <li id="menu-item-6690" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-6690">
                                    <a href="#">Wait us </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="widget w-footer widget-opening-hours">
                    <br><br>
                        <h6 class="widget-title"><span class="light">Avaliable </span> Pysiqian</h6>
                        <div class="opening-times">
                            <ul>
                                <li class="weekday">Monday
                                    <span class="right">8:00am-5:00pm</span>
                                </li>
                                <li class="weekday">Tuesday
                                    <span class="right">8:00am-5:00pm</span>
                                </li>
                                <li class="weekday">Wednesday
                                    <span class="right">8:00am-5:00pm</span>
                                </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>                 
            </div>
        </div>
    </div>
    <div class="bottom-footer" data-pg-collapsed>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="bottom-left">
                        <p>© 2017 <a href="#" target="_blank">Fitness App</a></p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="bottom-middle">
                        <p><a href="http://facebook.com" target="_blank"><i class="fa fa-facebook-square"></i></a><a href="http://twitter.com" target="_blank"><i class="fa fa-twitter-square"></i></a><a href="https://linkedin.com<i class="fa fa-linkedin-square"></i></a><a href="https://youtube.com"><i class="fa fa-youtube-square"></i></a></p>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                    <div class="bottom-right">
                        <p>For emergency tree removal <br><i class="fa fa-phone"></i> 040 - 5448992</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  
 
</footer>
<audio autoplay loop>
  <source src="assets/music/my_music.mp3" type="audio/mpeg">
  <source src="assets/music/my_music.mp3" type="audio/ogg">
  Your browser does not support the audio tag.
</audio>
</body>
</html>
<?php ob_end_flush(); ?>