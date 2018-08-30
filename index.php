<?php
session_start();

?>
<?php

if ($_SERVER['HTTP_HOST'] == "zeniteshares.com")
{
   $url = "https://www." . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   header("Location: $url");
} 
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zeniteshares";
$date = date('m-d-Y');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	

    // If the values are posted, insert them into the database.
   if (isset($_POST['email'])){ 
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if ($cpassword != $password){
    $ymsg = "Passwords Dont match.";
    
}else{
if (isset($_POST['email'])){
        
$name = $_POST['name'];

	$email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
      $referer = $_POST['referer'];
$bankname = $_POST['bankname'];
$bankacname = $_POST['bankacname'];
$bankacnumber = $_POST['bankacnumber'];
if ($email == $referer){
    $ymsg = "You are not allowed to refer your self.";
    
}else{
 
   $sql = "SELECT * FROM register WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
$xmsg = "User already exists.";
}else{
        $sql = "SELECT * FROM referer WHERE referer = '$referer'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
    $sql = "SELECT * FROM referer WHERE referer = '$referer'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $referer = $row['referer'];
           $no = $row['no'];
          $update = $no + 1;
}
    $sql = "UPDATE referer SET no='$update' WHERE referer='$referer'";
if ($conn->query($sql) === TRUE) {
echo"";
}
}else{
    
     $query = "INSERT INTO referer (referer, no) VALUES ('$referer', '0')";

       $result = mysqli_query($conn, $query);
        if($result){
            
 
       }
}
$query = "INSERT INTO pghtable (email, amountph, amountgh, cgh) VALUES ('$email', '0', '0', '0')";

       $result = mysqli_query($conn, $query);
        if($result){
       
 
       }
       $query = "INSERT INTO referer (referer, no, a) VALUES ('$email', '0', '$referer')";

       $result = mysqli_query($conn, $query);
        if($result){
       
 
       }
      
$encrypt=md5($email);
$pass=$password;
$to = "$email";
$subject = "REGISTRATION DETAILS";
$from= "....";
$headers = "From:support@zeniteshares.com" . $from;
$data = "\r\n$name You are Welcome to Zeniteshares kindly click on the link below to verify email  \r\n https://zeniteshares.com/verify/?email=$encrypt\r\ncopy link and paste in browser if not clickable.\r\n(this is an automated email and cant receive responses).";
mail($to,$subject,$data,$headers);
$encrypt=md5($email);
      $query = "INSERT INTO register (name, email, phone, password, bank, bankacname, bankacnumber, verify, blocked) VALUES ('$name', '$email', '$phone', '$pass', '$bankname', '$bankacname', '$bankacnumber', '$encrypt', '1')";

       $result = mysqli_query($conn, $query);
        if($result){
            $smsg = "Your registration was successful. Please verify your email with the link Sent(check spam if not in inbox).";
 
       }else{

            $fmsg ="User Registration Failed";
  
      }
   }
}   
 }
   }
} 
?>
<html lang="en">
<head>
<title>Zeniteshares Best Networking | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Newcomer Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/popup-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/mislider.css" rel="stylesheet" type="text/css" />
<link href="css/mislider-custom.css" rel="stylesheet" type="text/css" />

<link href="css/style.css" type="text/css" rel="stylesheet" media="all"> 
<link rel="stylesheet" href="css/main-gallery.css" type="text/css" media="screen" />  <!-- flexslider-CSS --> 
<link href="css/font-awesome.css" rel="stylesheet">		<!-- font-awesome icons -->
<!-- //Custom Theme files --> 

<!-- web-fonts -->  
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300i,400,400i,600,600i,700" rel="stylesheet">
<!-- //web-fonts -->
<style>
.input{
    -webkit-text-security: disc;
}</style>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
        function validate(){

            var a = document.getElementById("password").value;
            var b = document.getElementById("confirm_password").value;
            if (a!=b) {
               alert("Passwords do no match");
               return false;
            }
        }
     </script>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top"> 
     <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zeniteshares";
$date = date('d-m-Y H:m:s');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	

    // If the values are posted, insert them into the database.
    
if (isset($_POST['Email'])){
    $Email = $_POST['Email'];
$Password = $_POST['Password'];
$sql = "SELECT email,password FROM register WHERE email='$Email' AND 

password='$Password'";
$result = $conn->query($sql);
if ($result->num_rows == 0 ) {
    $fmsg="User Doesnt Exist OR Account Has Been Deleted... If you think this is an error, kindly send us a mail through the link on the bottom page.";
}else{
$sql = "SELECT email,verify FROM register WHERE email='$Email' AND 

verify='1'";
$result = $conn->query($sql);
if ($result->num_rows == 0 ) {
    $fmsg="your email has not been verified";
}else{
$sql = "SELECT email,blocked FROM register WHERE email='$Email' AND 

blocked='1'";
$result = $conn->query($sql);
if ($result->num_rows == 0) {
	$_SESSION["email"] = "$Email";
$_SESSION["password"] = "$Password";
	sleep(5);
	echo '<script>window.location = 

"aal/blocked.php"</script>';
}else{

    $_SESSION["email"] = "$Email";
$_SESSION["password"] = "$Password";
$smsg="Loging in...";
sleep(2);
    echo '<script>window.location = 

"aal/po.php"</script>';
}
 }   
}
}
?> 
	<!-- banner -->
	<div id="home" class="w3ls-banner"> 

		<!-- banner-text -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div class="w3layouts-banner-top">

							<div class="container">
								<div class="agileits-banner-info">
								 <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
<?php if(isset($xmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $xmsg; ?> </div><?php } ?>
<?php if(isset($ymsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $ymsg; ?> </div><?php } ?>
 


									<h3>Being Financially <span>Independent</span></h3>
											<p>Net Working With a differnce</p>
									<div class="agileits_w3layouts_more menu__item">
				<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
						    
			</div>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top1">
							<div class="container">
								<div class="agileits-banner-info">
								 <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
<?php if(isset($xmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $xmsg; ?> </div><?php } ?>
<?php if(isset($ymsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $ymsg; ?> </div><?php } ?>
 



									<h3>For every help you get extra <span>50%</span></h3>
										<p>5% referal Bonus  |  No guiders  |  Everybody Participates</p>
									<div class="agileits_w3layouts_more menu__item">
				<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
				  
			</div>
								</div>	
							</div>
						</div>
					</li>
					<li>
						<div class="w3layouts-banner-top w3layouts-banner-top2">
							<div class="container">
								<div class="agileits-banner-info">
								   <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
								<?php echo $smsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
<?php if(isset($xmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $xmsg; ?> </div><?php } ?>
<?php if(isset($ymsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $ymsg; ?> </div><?php } ?>




									<h3>Look Always Only <span>Successful</span></h3>
									<p>Join a community of over thousands</p>
									<div class="agileits_w3layouts_more menu__item">
											<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
											

										</div>
								</div>
								
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			
			<!--banner Slider starts Here-->
		</div>
		    <div class="thim-click-to-bottom">
				<a href="#about" class="scroll">
					<i class="fa fa-long-arrow-down" aria-hidden="true"></i>
				</a>
			</div>
 
	</div>	
	<!-- //banner --> 
			<!-- header -->
		<div class="header-w3layouts"> 
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header page-scroll">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Zeniteshares</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a class="navbar-brand" href="index.html">Ze<span>Nite</span>Shares</a></h1>
					</div> 
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav navbar-right">
							<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<li class="hidden"><a class="page-scroll scroll" href="#page-top"></a>	</li>
							<li><a class="page-scroll scroll" href="#home">Home</a></li>
							<li><a class="page-scroll scroll" href="#about">About</a></li>
							<li><a class="page-scroll scroll" href="#work">Stat.</a></li>
                                                        <li><a  href="#"  data-toggle="modal" data-target="#myModal3" >Sign in</a></li>
							<li><a class="page-scroll scroll" href="#"  data-toggle="modal" data-target="#myModal1">Register</a></li>
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>  
		</div>	
		<!-- //header -->
<!-- about -->
<div class="about" id="about">
 <div class="col-md-6 ab-w3-agile-img">
	     
	  </div>
      <div class="col-md-6 ab-w3-agile-info">
	   <div class="ab-w3-agile-info-text">
	   <p class="sub-text one">Who We Are</p>
	     <h2 class="title-w3">About Us</h2>
		 
		 <p>Zeniteshares is a peer to peer donation platform. it is a community of helpers where members grow their money by 50% in 7days.A participant provides help to member of community and earn 50% of PH in 7days. There is no central account where members pay in money. its a member to member donation. Zeniteshares is not a pyramid scheme, it is not a HYIP nor a MLM Zeniteshares is not a matrix system and you don't build any matrix before you earn. A participant earn 5% referral bonus for any participant referred to the platform. 
		 We have suppoters and sponsors backing the community financially to ensur its success with the aim of advertising their companies on our platform.</p>
		 <p style="font-weight: bolder; font-size: 15px; color: red;">PS: Only 20% is paid at the end of the month as the remaining 30% is left in the system for sustainability</p>
			<div class="agileits_w3layouts_more menu__item one">
				<a href="#" class="menu__link" data-toggle="modal" data-target="#myModal">Learn More</a>
			</div>
		  </div>
		  <div class="ab-w3-agile-inner">
	       <div class="col-md-6 ab-w3-agile-part">
				<h4>Awesome Features</h4>
		     <p>We have a well designed cross matching system ensuring our goals being met  .</p>
	       </div>
			 <div class="col-md-6 ab-w3-agile-part two">
				<h4>Support Features</h4>
		     <p>our "Ever ready" Supoort team is online 24/7 to assist you or solve any issues.</p>
	       </div>
			<div class="clearfix"></div>		   
	  </div>	
   </div>	 	  
	 
 
		<div class="clearfix"></div>
</div>
	<!-- //about -->
											<!-- Modal1 -->
													<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
														<div class="modal-dialog">
														<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<img src="images/2.jpg" alt=" " class="img-responsive">
																	<h5>How it works. </h5>
																	<p>Zeniteshares is simply a peer to peer donation platform. it is a community of helpers where members grow their money by 50% in 7 days.their are no central accounts.</p>
																</div>
															</div>
														</div>
													</div>
													<!-- //Modal1 -->

		<!-- /classes-->

   <!-- //classes-->
   
				<!-- Modal2-->
								<div class="pop-up"> 
			<div id="small-dialog" class="mfp-hide book-form">
				<h4>Sign Up Form </h4>
				<form class="form-signin" method="post">
				     <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
<?php if(isset($xmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $xmsg; ?> </div><?php } ?>
<?php if(isset($ymsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $ymsg; ?> </div><?php } ?>
 
					   <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="name"></p>
     <p><input class="w3-input w3-padding-16 w3-border" type="email" placeholder="email" required name="email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Phone" required name="phone"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="password" id="password" placeholder="Password" required name="password"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="password" id="confirm_password" placeholder="Confirm Password" required name="cpassword"></p>
<p><input  class="w3-input w3-padding-16 w3-border" type="text" placeholder="REFERER EMAIL (Optional)"  name="referer" value=<?php echo $emaili;?>></p>
  <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Bank Name" required name="bankname"></p> 
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Bank Account Name" required name="bankacname"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Bank Account Number" required name="bankacnumber"></p>
<script>
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
					<input type="submit" value="Sign Up">
				</form>
			</div>
		</div>
						<!-- //Modal3 -->

	<!-- Modal2-->
								<div class="pop-up"> 
			<div id="small-dialog" class="mfp-hide book-form">
				<h4>Sign In </h4>
				<form action="" method="post">
				    
					

					<input type="text" name="Email" class="email" placeholder="Email" required=""/>
					<input  name="Password"  placeholder="Password" required=""/>	
					<div class="check-box">
						
					</div>
										

					<input type="submit" value="Sign In">

				</form>
			</div>
		</div>
						<!-- //Modal2 -->
		
	<!-- instructors -->
		<!--/featured-projects-->
<div class="featured-section" id="work">
  <div class="container">
		 <p class="sub-text">Work Details</p>
		       
	</div>
</div>
<!--//featured-projects-->
<!-- counter -->
	<div class="services-bottom stats services">
		<div class="container">
		  <div class="wthree-agile-counter">
			<div class="col-md-3 w3_agile_stats_grid">
				<div class="agile_count_grid_left">
					<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
				</div>
				<div class="agile_count_grid_right">
					<p class="counter">7789</p> 
				</div>
				<div class="clearfix"> </div>
				<h4>Likes on FB</h4>
			</div>
			<div class="col-md-3 w3_agile_stats_grid">
				<div class="agile_count_grid_left">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				</div>
				<div class="agile_count_grid_right">
					<p class="counter">11684</p> 
				</div>
				<div class="clearfix"> </div>
				<h4>Happy Users</h4>
			</div>
			<div class="col-md-3 w3_agile_stats_grid">
				<div class="agile_count_grid_left">
					<span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
				</div>
				<div class="agile_count_grid_right">
					<p class="counter">10439</p> 
				</div>
				<div class="clearfix"> </div>
				<h4>People Loved</h4>
			</div>
			<div class="col-md-3 w3_agile_stats_grid">
				<div class="agile_count_grid_left">
					<span class="fa fa-trophy" aria-hidden="true"></span>
				</div>
				<div class="agile_count_grid_right">
					<p class="counter">9</p> 
				</div>
				<div class="clearfix"> </div>
				<h4>Sponsors</h4>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
		     <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
<?php if(isset($xmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $xmsg; ?> </div><?php } ?>
<?php if(isset($ymsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $ymsg; ?> </div><?php } ?>

<!-- //counter -->
	
   <!--/price -->
     
	<!-- Modal1 -->
						<div class="modal fade" id="myModal1" role="dialog">
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header book-form">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>Sign up Form</h4>
										<form class="form-signin"  method="post">
				     <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
<?php if(isset($xmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $xmsg; ?> </div><?php } ?>
<?php if(isset($ymsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $ymsg; ?> </div><?php } ?>
<?php
// Example 1
	$sql = "SELECT * FROM referer WHERE id = 2";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	$emaili = $row['referer'];
}
	
if ($emaili = ""){
	echo"";
}else

	$sql = "SELECT * FROM referer WHERE id = 2";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	$emaili = $row['referer'];
}


?>
					   <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="name"></p>
     <p><input class="w3-input w3-padding-16 w3-border" type="email" placeholder="email" required name="email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Phone" required name="phone"></p>
 <p><input class="w3-input w3-padding-16 w3-border" type="password" id="password" placeholder="Password" required name="password"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="password" id="confirm_password" placeholder="Confirm Password" required name="cpassword"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="REFERER EMAIL (Optional)"  name="referer" value=<?php echo $emaili;?>></p>
  <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Bank Name" required name="bankname"></p> 
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Bank Account Name" required name="bankacname"></p>
<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Bank Account Number" required name="bankacnumber"></p>
<script>
	var password = document.getElementById("password")
   ,confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
					<input type="submit" value="Sign Up">
				</form>
									</div>
								</div>
							</div>
						</div>
						<!-- //Modal1 -->


<!-- Modal3 -->
						<div class="modal fade" id="myModal3" role="dialog">
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header book-form">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4>Sign In</h4>
										  <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
											<?php echo $smsg; ?> </div><?php } ?>
											<?php if(isset($imsg)){ ?><div class="alert alert-warning" role="alert"> 
											<?php echo $imsg; ?> </div><?php } ?>
											   
											   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
											<?php echo $fmsg; ?> </div><?php } ?>
										<form class="form-signin" method="post">


												<input type="text" name="Email" class="email" placeholder="Email" required=""/>
												<input type="password" name="Password"  placeholder="Password" required=""/>
													<div class="g-recaptcha" data-sitekey="6LfjEyMUAAAAABDaluU_-luBCb5VrQzV-rGnokgI"></div>
										<br/>
												
	<br>											<input type="submit" value="Sign In">
<a href=forgot.php>Forgot password?</a>
												
											</form>
											
									</div>
								</div>
							</div>
						</div>
						<!-- //Modal3 -->

		</div>	
	  </div>	
	<!--//prices -->
				
	</div>
	<div class="clearfix"></div>
</div>

	<div class="contact" id="contact">
	<div id="particles-js2"></div>
		<div class="contact-top">
		<p class="sub-text">Choose Your Style</p>

			<h3 class="title-w3 con">Contact Us</h3>
			

			<form action="#" method="post" class="contact_form slideanim">

				<div class="message">
					<div class="col-md-6 col-sm-6 grid_6 c1">
						<input type="text" class="margin-right" Name="Name" placeholder="Name" required="">
						<input type="email" Name="Email" placeholder="Email" required="">
						<input type="text" class="margin-right" Name="Phone Number" placeholder="Phone Number" required="">
					</div>

					<div class="col-md-6 col-sm-6 grid_6 c1">
						<textarea name="Message" placeholder="Message" required=""></textarea>
					</div>
					<div class="clearfix"></div>
				</div>

				<input type="submit" value="SEND MESSAGE">
			</form>
				<section class="social">
                        <ul>
							<li><a class="icon fb" href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a class="icon tw" href="#"><i class="fa fa-twitter"></i></a></li>
							
							
							<li><a class="icon pin" href="#"><i class="fa fa-pinterest"></i></a></li>
							<li><a class="icon db" href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a class="icon gp" href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
					</section>
		</div>
	</div>
	<!-- //Contact -->
<!-- footer-top -->	
	<div class="footer-top">
		<div class="container">
			<div class="col-md-3 foot-left">
				<h3>Rules</h3>
			
				<p>The rules are symple, participate fairly, redeem your pledge before time runs out,NEVER upload fake pop if you are reported,you will be pernalised severely.Do not report a payment as fake if its not as we will investigate every fake pop report before taking any action</p>
			</div>
			<div class="col-md-3 foot-left">
					<h3>Get In Touch</h3>
					<p>Our support is always available and ready to answer to your request.</p>
				
						<div class="contact-btm">
							
							
						</div>
						<div class="contact-btm">
							
						<div class="contact-btm">
						</div>
							<span class="fa fa-envelope-o" aria-hidden="true"></span>
							<p><a href="mailto:support@zeniteshares.com">support@zeniteshares.com</a></p>
						</div>
						<div class="clearfix"></div>


			</div>
			<div class="col-md-3 foot-left">
				<h3>Latest Works</h3>
				<ul>
				<li><a href="#"><img src="images/a1.jpg" alt="" class="img-responsive"></a></li>
				<li><a href="#"><img src="images/a2.jpg" alt="" class="img-responsive"></a></li>
				<li><a href="#"><img src="images/a2.jpg" alt="" class="img-responsive"></a></li>
				<li><a href="#"><img src="images/a1.jpg" alt="" class="img-responsive"></a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-3 foot-left">
			<h3>Subscribe</h3>
			<p>put your email below to get updates from us. </p>
			<form action="#" method="post">	
					<input type="email" Name="Enter Your Email" placeholder="Enter Your Email" required="">
				<input type="submit" value="Subscribe">
			</form>
			</div>
				<div class="clearfix"></div>
		</div>
	</div>
<!-- /footer-top -->							

<!-- footer -->
			<div class="copy-right">
				<p>&copy; 2016 Core Hosts. All rights reserved | Design by <a href="">DBNI 080 627 866 99</a></p>
			</div>
			
<!-- //footer -->
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src="js/jquery-2.2.3.min.js"></script> 
	
<!-- skills -->

						<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
			<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:false,
									nav:true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>

 <!-- js -->
	<script src="js/main.js"></script>
<!-- search-jQuery -->
<!-- pop-up-box -->
			<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
			<!--//pop-up-box -->
			<script>
				$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});														
				});
			</script>

		<!-- Map-JavaScript -->
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>        
			<script type="text/javascript">
				google.maps.event.addDomListener(window, 'load', init);
				function init() {
					var mapOptions = {
						zoom: 11,
						center: new google.maps.LatLng(40.6700, -73.9400),
						styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
					};
					var mapElement = document.getElementById('map');
					var map = new google.maps.Map(mapElement, mapOptions);
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(40.6700, -73.9400),
						map: map,
					});
				}
			</script>
			<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
		<script>
			$('.counter').countUp();
		</script>
<!-- //stats -->

	<!-- //Map-JavaScript -->
		<script src="js/mislider.js" type="text/javascript"></script>
		<script type="text/javascript">
			jQuery(function ($) {
				var slider = $('.mis-stage').miSlider({
					//  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
					stageHeight: 320,
					//  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
					slidesOnStage: false,
					//  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
					slidePosition: 'center',
					//  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
					slideStart: 'mid',
					//  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
					slideScaling: 150,
					//  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
					offsetV: -5,
					//  Center slide contents vertically - Boolean. Default: false
					centerV: true,
					//  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
					navButtonsOpacity: 1,
				});
			});
		</script>

	<script type="text/javascript">
						$(window).load(function() {
							$("#flexiselDemo1").flexisel({
								visibleItems:3,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,    		
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
						    	responsiveBreakpoints: { 
						    		portrait: { 
						    			changePoint:480,
						    			visibleItems: 1
						    		}, 
						    		landscape: { 
						    			changePoint:640,
						    			visibleItems: 2
						    		},
						    		tablet: { 
						    			changePoint:768,
						    			visibleItems: 2
						    		}
						    	}
						    });
						    
						});
			</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>