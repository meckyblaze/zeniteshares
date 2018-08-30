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
if (!$Email) {
  sleep(2);
  header('Location: ../index.php');
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
          $cash=$balance/1000;
          $cas=round($cash);
          $ca=$cas*1000;
        
}
$sql = "SELECT * FROM matched WHERE emailg='" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
    $nf=1;
}else
$nf="";

$sql = "SELECT * FROM matched WHERE emailp='" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
    $nf=1;
}else
$sql = "SELECT * FROM matched WHERE emailp='" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows < 0 ) {
    $nf="";
}


?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zeniteshares";
$Email = "" . $_SESSION["email"] . "";
$date = date('Y-m-d h:i:s');
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
            $dateph = $row['dateph'];
            $now = time("$date"); // or your date as well
$your_date = strtotime("$dateph");
$hourdiff = round((strtotime($date) - $your_date)/3600, 1);
$t = 168 - $hourdiff;
}

     
if ($t <= 168){
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
                                  //for provide help//




$sql = "SELECT * FROM matched WHERE emailp = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
// Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
$sql = "SELECT * FROM matched WHERE emailp = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $id = $row['id'];
          $namep = $row['namep'];
           $emailp = $row['emailp'];
            $Phonep = $row['phonep'];
            $nameg = $row['nameg'];
           $emailg = $row['emailg'];
            $Phoneg = $row['phoneg'];
            $amount = $row['amount'];
           $pop = $row['pop'];
            $popid = $row['popid'];
             $bankname = $row['bank'];
           $bankacname = $row['bankacname'];
            $bankacnumber = $row['bankacnumber'];
            $day = $row['reg_date'];
                         
  $daya = $row['a'];
$date = date('d-m-Y H:m:s');
$now = time("$date"); // or your date as well
$your_date = strtotime("$day");
$hourdiff = round((strtotime($date) - $your_date)/3600, 1);
$t = 12 - $hourdiff;
  
          $date = date('d-m-Y H:m:s');
$nowa = time("$date"); // or your date as well
$your_datea = strtotime("$daya");
$hourdiffa = round((strtotime($date) - $your_datea)/3600, 1);
$tp = 12 - $hourdiffa;
    $popid = $popid;        
}
$sql = "SELECT * FROM matched WHERE emailp = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
// Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
   $sql = "SELECT * FROM matched WHERE emailp = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $id = $row['id'];
          $namep = $row['namep'];
           $emailp = $row['emailp'];
            $Phonep = $row['phonep'];
            $nameg = $row['nameg'];
           $emailg = $row['emailg'];
            $Phoneg = $row['phoneg'];
            $amount = $row['amount'];
           $pop = $row['pop'];
            $popid = $row['popid'];
             $bankname = $row['bank'];
           $bankacname = $row['bankacname'];
            $bankacnumber = $row['bankacnumber'];
                  $day = $row['reg_date'];
                         
  $daya = $row['a'];
$date = date('d-m-Y H:m:s');
$now = time("$date"); // or your date as well
$your_date = strtotime("$day");
$hourdiff = round((strtotime($date) - $your_date)/3600, 1);
$t = 12 - $hourdiff;
  
          $date = date('d-m-Y H:m:s');
$nowa = time("$date"); // or your date as well
$your_datea = strtotime("$daya");
$hourdiffa = round((strtotime($date) - $your_datea)/3600, 1);
$tp = 12 - $hourdiffa;
$popid = $popid;
    if ($popid ==1){
           if($tp < 1){
              //auto confirmation starts
              $sql = "SELECT * FROM matched WHERE emailg='$emailg' AND emailp='$emailp'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
while($row = $result->fetch_assoc()) {
          $amount = $row['amount'];
           $Emailp = $row['emailp'];
            $Phonep = $row['phonep'];
             
}
}
$sql = "SELECT * FROM matched WHERE emailg='$emailg' AND emailp='$emailp'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
while($row = $result->fetch_assoc()) {
          $amount = $row['amount'];
           $Emailp = $row['emailp'];
            $Phonep = $row['phonep'];
             
}
}
$sql = "SELECT * FROM pghtable WHERE email='$Emailp'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
while($row = $result->fetch_assoc()) {
          $amountgh = $row['amountgh'];
           
             
}
}
$newamoun=$amount * 0.2;
$newamou=$newamoun + $amount;
$newamount=$amountgh + $newamou;
$sql = "UPDATE pghtable SET amountgh='$newamount' WHERE email='$Emailp'";
if ($conn->query($sql) === TRUE) {
echo"";
}
$sql = "SELECT * FROM referer WHERE referer='$Emailp'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
while($row = $result->fetch_assoc()) {
          $a = $row['a'];
           
             
}
}
$sql = "SELECT * FROM pghtable WHERE email='$a'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
while($row = $result->fetch_assoc()) {
          $amountrgh = $row['amountgh'];
           
             
}
}
$ref = $amount * 0.05;
$latest = $ref + $amountrgh;
$sql = "UPDATE pghtable SET amountgh='$latest' WHERE email='$a'";
if ($conn->query($sql) === TRUE) {
echo"";
}
  $sql = "DELETE FROM matched WHERE emailg='$emailg' AND emailp='$emailp'";
if ($conn->query($sql) === TRUE) {
  $smsg="A transaction has been confirmed automatically";
}
              
              //auto confirmation ends
              
          }
             
                echo "";
         }else{
         if ($t < 1) {

          
    $sql = "UPDATE register SET blocked='0' WHERE email ='$emailp'";
if ($conn->query($sql) === TRUE){
    echo "";
  }

    $sql = "SELECT email,blocked FROM register WHERE email='" . $_SESSION["email"] . "' AND 
blocked='0'";
$result = $conn->query($sql);
if ($result = $conn->num_rows == 0) {
  echo '<script>window.location = 

"blocked.php"</script>';
}
             $sql = "SELECT * FROM pghtable WHERE email = '$emailg'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $amountgh = $row['amountgh'];
          $update = $amountgh+$amount;
}
   $sql = "DELETE FROM matched WHERE emailp='$emailp' AND 

emailg='$emailg'";
if ($conn->query($sql) === TRUE) {
    echo "";
}

  $sql = "UPDATE pghtable SET amountgh='$update' WHERE email='$emailg'";
if ($conn->query($sql) === TRUE) {
echo"";
}

$sql = "SELECT * FROM pghtable WHERE email = '$emailp'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $amountph = $row['amountph'];
          $cancelled=0;
          $amountph=$cancelled;
}

$sql = "UPDATE pghtable SET amountph='$cancelled' WHERE email='$emailp'";
if ($conn->query($sql) === TRUE) {
echo"";
}


         }else{
        echo "";}
     
     
}

  

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
            <a href="po.php" class="logo">ZE<span class="lite">NITE</span>SHARES</a>
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
                          <li><a class="" href="basic_table1.php">Cash out</a></li>
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
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> <?php echo $name;?></h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="po.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              
            <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg div">
						<i class="fa fa-usd"><?php echo $providing;?></i>
						<div class="title"><font size=2>Amount to pay</font></div>
						<div class="count"></div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg div">
						<i class="fa fa-users">&nbsp<?php echo $no;?></i>
						<div class="count"><font size=3>Number of referals</font></div>
						<div class="title"></div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg div">
						<i class="fa fa-usd"><?php echo $balance;?></i>
						<div class="title"><font size=1>Anount to recieve</font></div>
						<div class="count"></div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg div">
						<i class="fa fa-spin fa-cog"></i>
						<div class="count">Status</div>
						<div class="title">Active</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
			</div><!--/.row-->
		
			
           <div class="row">
		    <div class="col-lg-9 col-md-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-map-marker red"></i><strong>Notice Board</strong></h2>
							<div class="panel-actions">
								
								<a href="" class="btn-close"><i class="fa fa-times"></i></a>
							</div>	
						</div>
						<div class="panel-body-map">
							 <table class="table table-hover personal-task">
                              <tbody>
                              <tr>
                                  <td>23-5-17</td>
                                  <td>
                                      <font color=red>Always redeem your pledge to avoid being removed from the system despite outstanding GH</font>
                                  </td>
                                  <td>
                                      <span class="badge bg-success">Admin</span>
                                  </td>
                                  <td>
                                    
                                  </td>
                                  </tr>
                                <tr>
                                  <td>23-5-17</td>
                                  <td>
                                      kindly use the cash out button again if you were not paid by the previous participant, Thank you.
                                  </td>
                                  <td>
                                      <span class="badge bg-success">Support</span>
                                  </td>
                                  <td>
                                    <span class="profile-ava">
                                        
                                    </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>23-5-17</td>
                                  <td>
                                      <font color=red>MATCH STATUS: </font>Always check your Transaction page to know when matched.
                                  </td>
                                  <td>
                                      <span class="badge bg-success">Admin</span>
                                  </td>
                                  <td>
                                    
                                  </td>
                              </tr>
                              <tr>
                                  <td>23-5-17</td>
                                  <td>
                                      <font color=red>Fake POPs</font> Are treated as such, hence abstain from such practices.
                                  </td>
                                  <td>
                                      <span class="badge bg-success">Admin</span>
                                  </td>
                                  <td>
                                    
                                  </td>
                              </tr>
                              <tr>
                                  <td>23-5-17</td>
                                  <td>
                                      Zeniteshares is commited to its goal and will stop at nothing to achieve that.
                                  </td>
                                  <td>
                                      <span class="badge bg-success">Support</span>
                                  </td>
                                  <td>
                                    <span class="profile-ava">
                                        
                                    </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td>21-10-14</td>
                                  <td>
                                share referal link, get bonus.</td>
                                  <td>
                                      <span class="badge bg-success">Admin</span>
                                  </td>
                                  <td>
                                     
                                  </td>
                              </tr>                              
                             
                              </tbody>
                          </table>	
						</div>
	
					</div>
				</div>
              <div class="col-md-3">
              <!-- List starts -->
				<ul class="today-datas">
                <!-- List #1 -->
				<li>
                  <!-- Graph -->
                  <div><span id="todayspark1" class="spark"></span></div>
                  <!-- Text -->
                  <div class="datas-text">+13000 users</div>
                </li>
               
                                                                                                                           
              </ul>
              
              </div>
              <div class="col-md-3">
					
					<div class="social-box facebook div">
						<i class="fa fa-facebook"></i>
						<ul>
							<li>
								<strong>9k</strong>
								<span>Likes</span>
							</li>
							<li>
								<strong>50</strong>
								<span>feeds</span>
							</li>
						</ul>
					</div><!--/social-box-->
				</div>
			<!--/col-->
				<div class="col-md-3">
					
					<div class="social-box twitter div">
						<i class="fa fa-twitter"></i>
						<ul>
							<li>
								<strong>162k</strong>
								<span>followers</span>
							</li>
							<li>
								<strong>262</strong>
								<span>tweets</span>
							</li>
						</ul>
					</div><!--/social-box-->			
					
				</div><!--/col-->
				
              </div>

                    
			 
           </div>  
           
            
		  
		  <!-- Today status end -->
			
              
		
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>
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
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
	<script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});

  </script>

  </body>
</html>
