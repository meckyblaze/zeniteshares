<?php
ob_start();
session_start();

?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zeniteshares";
$Email = "" . $_SESSION["email"] . "";
$Password = "" . $_SESSION['password'] . "";
$date = date('d-m-Y h:i:s');
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$ip = "$hostname";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['emailk'])){
    $fullname = "" . $_SESSION["fullname"] . "";
$emailk = $_POST['emailk'];
$subject = $_POST['subject'];
$ticket = $_POST['ticket'];

$to = "support@perfundswallet.com";
$from= "....";
$headers = "From:$emailk" . $from;
$data = "\r\nTicket: $ticket";
mail($to,$subject,$data,$headers);
$smsg="Your Ticket Has been recieved. Wait for email response";
    
}



$sql = "SELECT email,password FROM register WHERE email='" . $_SESSION["email"] . "' AND 

password='" . $_SESSION["password"] . "'";
$result = $conn->query($sql);
if ($result->num_rows == 0 ) {
// Return the number of rows in result set
  $rowcount1=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
echo ' <script>window.location = 

"index.php"</script>';
exit();

}
 $sql = "SELECT * FROM referer WHERE referer = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $referal = $row['referer'];
           $no = $row['no'];
           
}

$sql = "SELECT * FROM register WHERE email = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $name = $row['name'];
           $Email = $row['email'];
            $Phone = $row['phone'];
             $bankname = $row['bank'];
           $bankacname = $row['bankacname'];
            $bankacnumber = $row['bankacnumber'];
}
$sql = "SELECT * FROM pghtable WHERE email = '$Email'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $balance = $row['amountgh'];
          $providing = $row['amountph'];
          $cash=$balance/500;
          $cas=round($cash);
          $ca=$cas*500;
        
}
$sql = "SELECT * FROM matched WHERE emailg='" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
    $nf=1;
}
$sql = "SELECT * FROM matched WHERE emailp='" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
    $nf=1;
}else
$nf="";


?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zeniteshares";
$Email = "" . $_SESSION["email"] . "";
$date = date('d-m-Y h:i:s');
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$ip = "$hostname";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM pghtable WHERE email = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nameh = $row['name'];
           $Emailh = $row['email'];
            $Phoneh = $row['phone'];
             $amountphh = $row['amountph'];
           $amountghh = $row['amountgh'];
            $amountcgh = $row['cgh'];
}
if ($amountphh >= 1000){
    $sql = "SELECT * FROM pghtable WHERE email = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nameh = $row['name'];
           $Emailh = $row['email'];
            $Phoneh = $row['phone'];
             $amountphh = $row['amountph'];
           $amountghh = $row['amountgh'];
            $amountcgh = $row['cgh'];
            
         
}
  
    for ($x = 0; $x <= 700; $x++) {

       $sql = "SELECT * FROM pghtable WHERE cgh <= '$amountphh' AND cgh >'0'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
          $sql = "SELECT * FROM pghtable WHERE cgh <= '$amountphh' AND cgh >'0'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $namem = $row['name'];
           $Emailm = $row['email'];
            $Phonem = $row['phone'];
             $amountphm = $row['amountph'];
           $amountghm = $row['amountgh'];
            $amountcgm = $row['cgh'];
}

          $sql = "SELECT * FROM register WHERE email = '$Emailm'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nam = $row['name'];
           $Emai = $row['email'];
            $Phon = $row['phone'];
             $banknam = $row['bank'];
           $bankacnam = $row['bankacname'];
            $bankacnumbe = $row['bankacnumber'];
}
          $sql = "SELECT * FROM register WHERE email = '$Emailh'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $na = $row['name'];
           $Ema = $row['email'];
            $Pho = $row['phone'];
             $bankna = $row['bank'];
           $bankacna = $row['bankacname'];
            $bankacnumb = $row['bankacnumber'];
}
$new = $amountphh - $amountcgm;
   $sql = "UPDATE pghtable SET amountph='$new' WHERE email='$Emailh'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "";
}
$sql = "INSERT INTO matched (namep, emailp, phonep, nameg, emailg, phoneg, amount, bank, bankacname, bankacnumber)
VALUES ('$na', '$Ema', '$Pho', '$nam', '$Emai', '$Phon', '$amountcgm', '$banknam', '$bankacnam', '$bankacnumbe')";

if ($conn->query($sql) === TRUE) {
   $sql = "UPDATE pghtable SET cgh='0' WHERE email='$Emailm'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "";
}
}
  $sql = "SELECT * FROM pghtable WHERE email = '$Emailh'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nameh = $row['name'];
           $Emailh = $row['email'];
            $Phoneh = $row['phone'];
             $amountphh = $row['amountph'];
           $amountghh = $row['amountgh'];
            $amountcgh = $row['cgh'];
            
          
}

  
  }else{
        break;
        
    }
    }
    
}





?>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zeniteshares";
$Email = "" . $_SESSION["email"] . "";
$date = date('d-m-Y h:i:s');
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$ip = "$hostname";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM pghtable WHERE email = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nameh = $row['name'];
           $Emailh = $row['email'];
            $Phoneh = $row['phone'];
             $amountphh = $row['amountph'];
           $amountghh = $row['amountgh'];
            $amountcgh = $row['cgh'];
}
   //for ghing//
$sql = "SELECT * FROM pghtable WHERE email = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nameh = $row['name'];
           $Emailh = $row['email'];
            $Phoneh = $row['phone'];
             $amountphh = $row['amountph'];
           $amountghh = $row['amountgh'];
            $amountcgh = $row['cgh'];
}
if ($amountcgh >= 1000){
    $sql = "SELECT * FROM pghtable WHERE email = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nameh = $row['name'];
           $Emailh = $row['email'];
            $Phoneh = $row['phone'];
             $amountphh = $row['amountph'];
           $amountghh = $row['amountgh'];
            $amountcgh = $row['cgh'];        
}
  
    for ($x = 0; $x <= 260; $x++) {

       $sql = "SELECT * FROM pghtable WHERE amountph <= '$amountcgh' AND amountph >'0'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
          $sql = "SELECT * FROM pghtable WHERE amountph <= '$amountcgh' AND amountph >'0'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $namem = $row['name'];
           $Emailm = $row['email'];
            $Phonem = $row['phone'];
             $cgh = $row['cgh'];
           $amountghm = $row['amountgh'];
            $amountcgm = $row['amountph'];
}
          $sql = "SELECT * FROM register WHERE email = '$Emailm'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nam = $row['name'];
           $Emai = $row['email'];
            $Phon = $row['phone'];
             $banknam = $row['bank'];
           $bankacnam = $row['bankacname'];
            $bankacnumbe = $row['bankacnumber'];
}
          $sql = "SELECT * FROM register WHERE email = '$Emailh'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $na = $row['name'];
           $Ema = $row['email'];
            $Pho = $row['phone'];
             $bankna = $row['bank'];
           $bankacna = $row['bankacname'];
            $bankacnumb = $row['bankacnumber'];
}
$new = $amountcgh - $amountcgm;
   $sql = "UPDATE pghtable SET cgh='$new' WHERE email='$Emailh'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "";
}
$sql = "INSERT INTO matched (namep, emailp, phonep, nameg, emailg, phoneg, amount, bank, bankacname, bankacnumber)
VALUES ('$nam', '$Emai', '$Phon', '$na', '$Ema', '$Pho', '$amountcgm', '$bankna', '$bankacna', '$bankacnumb')";

if ($conn->query($sql) === TRUE) {
   $sql = "UPDATE pghtable SET amountph='0' WHERE email='$Emailm'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "";
}
}
  $sql = "SELECT * FROM pghtable WHERE email = '$Emailh'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nameh = $row['name'];
           $Emailh = $row['email'];
            $Phoneh = $row['phone'];
             $amountphh = $row['amountph'];
           $amountghh = $row['amountgh'];
            $amountcgh = $row['cgh'];
            
          
}

  
  }else{
        break;
        
    }
    }
    
}
   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Wallet</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	<style>
	   .div {
   
    box-shadow: 10px 10px 5px #888888;
}
	</style>
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">ZE<span class="lite">NITE</span>SHARES</a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                       
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
              
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                
                            </span>
                            <span class="username"><?php echo $name;?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="blank.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="general.php"><i class="icon_mail_alt"></i> Write Testmonie</a>
                            </li>
                           
                           
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="po.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_profile"></i>
                          <span>Profile</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">                          
                          
                          <li><a class="" href="blank.php">My Details</a></li>
                          <li><a class="" href="logout.php">Sign out</a></li>
                      </ul>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Support</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                                                   
                          <li><a class="" href="form_validation.php">Submit ticket</a></li>
                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Testmonies</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.php">View/Write</a></li>
                         
                      </ul>
                  </li>
                 
                
                             
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                           <span>Transaction<?php if($nf>0){echo '<font class="badge bg-important" color=red><b>' .$nf. ' </b></font>';}?></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.php">Provide</a></li>
                          <li><a class="" href="basic_table.php">Cash out</a></li>
                      </ul>
                  </li>
                  
                  
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-files-o"></i> <?php echo $name;?></h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_document_alt"></i>Support</li>
						<li><i class="fa fa-files-o"></i>Submit Ticket</li>
					</ol>
				</div>
			</div>
              <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Ticket
                          </header>
                          <div class="panel-body">
                              <div class="form">
                                  <form  method="post" action="">
                                      <div class="form-group ">
                                          <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($imsg)){ ?><div class="alert alert-warning" role="alert"> 
<?php echo $imsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
                                          <label for="cname" class="control-label col-lg-2">Name <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="cname" name="fullname" value="<?php echo $name;?>"minlength="5" type="text" required /><br>
                                          </div>
                                      </div><br>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control " id="cemail" type="email" value="<?php echo $Email;?>" name="emailk" required />
                                               <input class="form-control " id="cemail" type="hidden" value="<?php echo $Email;?>" name="emailk" required /><br>
                                          </div>
                                      </div><br>
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Subject <span class="required">*</span></label>
                                          <div class="col-lg-10">
                                              <input class="form-control" id="subject" name="subject" minlength="5" type="text" required /><br>
                                          </div>
                                      </div>     <br>                                 
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Message</label>
                                          <div class="col-lg-10">
                                              <textarea class="form-control " id="ccomment" name="ticket" required></textarea><br>
                                          </div>
                                      </div><br>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" type="submit">Submit</button>
                                             
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
              </div>
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <div class="text-right">
        <div class="credits">
            <!-- 
                All the links in the footer should remain intact. 
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            <a href="">Core Hosts</a> by <a href="" style="margin-right: 20px;">DBNI 08062786699</a>
        </div>
    </div>
  </section>
  <!-- container section end -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery validate js -->
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>    


  </body>
</html>
