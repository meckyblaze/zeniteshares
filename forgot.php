<?php
session_start();

?>
<?php

if ($_SERVER['HTTP_HOST'] == "perfundswallet.com")
{
   $url = "https://www." . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   header("Location: $url");
} 
?>
<html>
<?php
$servername = "localhost";
$username = "firstbir_001";
$password = "An0therrichard3303";
$dbname = "firstbir_001";
$date = date('m-d-Y');
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
   if (isset($_POST['email'])){ 
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if ($cpassword != $password){
    $ymsg = "Passwords Dont match.";
    
}else{
$encrypt=md5($email);
    $sql = "UPDATE register SET verify='$encrypt' WHERE email='$email'";
if ($conn->query($sql) === TRUE) {
echo"";
}
    $sql = "UPDATE register SET password='$password' WHERE email='$email'";
if ($conn->query($sql) === TRUE) {
echo"";
}
$to = "$email";
$subject = "Reset Password";
$from= "....";
$headers = "From:support@perfundswallet.com" . $from;
$data = "\r\n$You recently requested your password to be changed to ******** kindly click on the link below to confirm this request  \r\n https://perfundswallet.com/verify/password.php/?email=$encrypt\r\ncopy link and paste in browser if not clickable.\r\nYou can contact us if you did not make this request. \r\n(this is an automated email and cant receive responses).";
mail($to,$subject,$data,$headers);
$smsg = "Your password has been reset.";
}
}
?>
<head>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Roboto", Helvetica, Arial, sans-serif;
  font-weight: 100;
  font-size: 12px;
  line-height: 30px;
  color: #777;
  background: #0d0577;
}

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="password"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin: 150px 0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="password"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="password"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #0d0577;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}
</style>
</head>
<div class="container"><form id="contact" action="" method="post">  
 
    <h3>RESET PASSWORD.</h3>
<font color=green><b><?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?></b></font>
<?php if(isset($imsg)){ ?><div class="alert alert-warning" role="alert"> 
<?php echo $imsg; ?> </div><?php } ?>
   
  <font color=red><b> <?php if(isset($ymsg)){ ?><div  role="alert"> 
<?php echo $ymsg; ?> </div><?php } ?></b></font>
    <h4>put email and new password below.</h4>
    
 <h4>Fill details below to reset password.</h4><form method=post action=>
    <fieldset>
      <input name=email placeholder="Your Email Address" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input name=password placeholder="New password" type="password" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input name=cpassword placeholder="Confirm password" type="password" tabindex="4" required>
    </fieldset>
    <fieldset>
     
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
<div align=center><a href=https://perfundswallet.com>GO BACK TO HOME</a></div>
    </fieldset></div></form>
    <p class="copyright">Designed by <a href="" target="_blank" title="Colorlib">DBNI</a></p>
  </form>
</div>
</html>