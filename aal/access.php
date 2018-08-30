<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive 

Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, 

Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Zeniteshares</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

  <body class="login-img3-body">
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
    $fmsg="User Doesnt Exist";
}else{
    $_SESSION["email"] = "$Email";
$_SESSION["password"] = "$Password";
$smsg="Loging in...";
sleep(5);
    echo '<script>window.location = 

"Zeniteshares/aal/po.php"</script>';
}
    
}
?>

   

      <form class="login-form" 

 method=post>   
 
        <div class="login-wrap">
             <div class="container">
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($imsg)){ ?><div class="alert alert-warning" role="alert"> 
<?php echo $imsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i 

class="icon_profile"></i></span>

              <input type="text" class="form-control" 

placeholder="Email" required autofocus name=Email>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i 

class="icon_key_alt"></i></span>
                <input type="password" class="form-control" 

placeholder="Password" required name=Password>
            </div>
            		<div class="g-recaptcha" data-sitekey="6LfjEyMUAAAAABDaluU_-luBCb5VrQzV-rGnokgI"></div>
										<br/>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?

</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" 

type="submit">Login</button>
          
        </div>
      </form>
    <div class="text-right">
            <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro 

version.
                    Licensing information: 

https://bootstrapmade.com/license/
                    Purchase the pro version form: 

https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->
                <a href="">Core Hosts</a> by <a href="">DBNI 08062786699</a>
            </div>
        </div>
    </div>


  </body>
</html>
