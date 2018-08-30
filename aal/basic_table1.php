<?php
ob_start();
session_start();

?>
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
$amount = $_POST['amountph'];
    if ($amount > 200000){
    $fmsg="Maximum PH is 200000";
    
}
else{
if ($amount < 10000){
  $fmsg="Minimum PH is 10000";
    
}else{
$sql = "SELECT * FROM pghtable WHERE email = '$Email'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $amountph = $row['amountph'];
          $amountgh = $row['amountgh'];
          
}
if ($amountph <= 1000){

if ($amountgh <= 1000){
        $sql = "UPDATE pghtable SET amountph='$amount' WHERE email='$Email'";
if ($conn->query($sql) === TRUE) {


}
        $sql = "UPDATE pghtable SET dateph='$date' WHERE email='$Email'";
if ($conn->query($sql) === TRUE) {


}
$smsg="Your request has been added...wait to be matched";
//instantmatching

  $sql = "SELECT * FROM pghtable WHERE email = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
         $sql = "SELECT * FROM pghtable WHERE email = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $amountin = $row['amountph'];
           $iph=$amountin*0.1;
           
}
  $sql = "SELECT * FROM pghtable WHERE cgh <= '$iph'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
              $sql = "SELECT * FROM pghtable WHERE cgh <= '$iph'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nameip = $row['name'];
           $Emailip = $row['email'];
            $Phoneip = $row['phone'];
             $amountphip = $row['amountph'];
           $amountghip = $row['amountgh'];
            $amountcgip = $row['cgh'];
}
$newi = $iph-$amountcgip;
$main=$amountphh*0.1;
$mai=$amountphh-$main;
$new = $mai+$newi;
          $sql = "SELECT * FROM register WHERE email = '$Emailip'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $namip = $row['name'];
           $Emaiip = $row['email'];
            $Phonip = $row['phone'];
             $banknamip = $row['bank'];
           $bankacnamip = $row['bankacname'];
            $bankacnumbeip = $row['bankacnumber'];
}
          $sql = "SELECT * FROM register WHERE email = '$Emailh'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $nat = $row['name'];
           $Emat = $row['email'];
            $Phot = $row['phone'];
             $banknat = $row['bank'];
           $bankacnat = $row['bankacname'];
            $bankacnumbt = $row['bankacnumber'];
}
   $sql = "UPDATE pghtable SET amountph='$new' WHERE email='$Emailh'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    echo "";
}
$sql = "INSERT INTO matched (namep, emailp, phonep, nameg, emailg, phoneg, amount, bank, bankacname, bankacnumber)
VALUES ('$nat', '$Emat', '$Phot', '$namip', '$Emaiip', '$Phonip', '$amountcgip', '$banknamip', '$bankacnamip', '$bankacnumbeip')";

if ($conn->query($sql) === TRUE) {
   $sql = "UPDATE pghtable SET cgh='0' WHERE email='$Emailm'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
    $imsg="A fraction of Your PH has been matched";
}
}
}
}


}else{
    
$fmsg="you have an outstanding gh so cant ph";

}
}else{
   $fmsg="you have an outstanding ph so cant ph";

    
}
}
}       
   
 }

    
?>
<?php
//confirmation
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
  
if (isset($_POST['emair'])){
    $emaile = $_POST['Emailr'];
$emailr = $_POST['emair'];
$subject = "FAKE POP";


$to = "support@zeniteshares.com";
$from= "....";
$headers = "From:$emaile" . $from;
$data = "\r\nFAKEPOP: $emailr uploaded fake pop ";
mail($to,$subject,$data,$headers);
$smsg="Report Recieved and will be treated";
    
}
    // If the values are posted, insert them into the database.

 
 if (isset($_POST['emai'])){
     
     $Email = $_POST['Emailc'];
$Emailp = $_POST['emai'];
$date = date('d-m-Y h:i:s');
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$sql = "SELECT * FROM matched WHERE emailg='$Email' AND emailp='$Emailp'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
while($row = $result->fetch_assoc()) {
          $amount = $row['amount'];
           $Emailp = $row['emailp'];
            $Phonep = $row['phonep'];
             
}
}
$sql = "SELECT * FROM matched WHERE emailg='$Email' AND emailp='$Emailp'";
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
$smsg="Transaction Confirmed";
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
  $sql = "DELETE FROM matched WHERE emailg='$Email' AND emailp='$Emailp'";
if ($conn->query($sql) === TRUE) {
   $smsg="Transaction Confirmed";
}
 }
?>

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
    
if (isset($_POST['Emailop'])){
    
    
    $Email = $_POST['Emailop'];
$emai = $_POST['emaiop'];
$date = date('Y-m-d H:m:s');

$ImageName = $_FILES['pop']['name'];
$fileElementName = 'pop';
$path = 'upload/'; 
$location = $path . $_FILES['pop']['name'];
$pat = '../upload/';
$link = $pat . $_FILES['pop']['name'];
if (file_exists($location)) {
  $fmsg="File exists. Try renaming";
}else{
move_uploaded_file($_FILES['pop']['tmp_name'], $location);
$smsg="Proof recieved. Timer stoped";
$sql = "UPDATE matched SET pop='$link' WHERE emailp='$Email' AND emailg='$emai'";
if ($conn->query($sql) === TRUE) {
echo "";
}
$id=1;
$sql = "UPDATE matched SET popid='$id' WHERE emailp='$Email' AND 

emailg='$emai'";
if ($conn->query($sql) === TRUE) {
echo "";
}
$sql = "UPDATE matched SET a='$date' WHERE emailp='$Email' AND 

emailg='$emai'";
if ($conn->query($sql) === TRUE) {
echo "";
}
} 

    
}
//for cash out
    
if (isset($_POST['amountgh'])){
    $Email = $_POST['Email'];
$amountgh = $_POST['amountgh'];
$date = date('d-m-Y h:i:s');
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$ip = "$hostname";

if ($amountgh < 1000){
 $fmsg="Your balance is below 1000";
}else{
$sql = "SELECT * FROM pghtable WHERE email = '$Email'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $amountph = $row['amountph'];
          $amountgh = $row['amountgh'];
          $dateph = $row['dateph'];
          $date = date('d-m-Y H:m:s');
$now = time("$date"); // or your date as well
$your_date = strtotime("$dateph");
$hourdiff = round((strtotime($date) - $your_date)/3600, 1);
$t = 168 - $hourdiff;
          
}
if ($t > 1){
       $fmsg="It is not up to 7 days Maturity";
}else{

if ($amountph > 1000){
    $fmsg="You Still Have a Pledge to Reedem";
}else{
     $sql = "UPDATE pghtable SET amountgh='0' WHERE email='$Email'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
}
    $sql = "UPDATE pghtable SET cgh='$amountgh' WHERE email='$Email'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE) {
           $smsg="Request has been added...Wait to be matched";
}

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





$sql = "SELECT email,password FROM register WHERE email='" . $_SESSION["email"] . "' AND 

password='" . $_SESSION["password"] . "'";
$result = $conn->query($sql);
if ($result->num_rows == 0 ) {
// Return the number of rows in result set
  $rowcount1=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
echo '<script>window.location = 

"https://zeniteshares.com/signin.php"</script>';
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
$Password ="" . $_SESSION['password'] . "";
$date = date('d-m-Y h:i:s');
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$ip = "$hostname";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM matched WHERE emailg = '$Email' AND popid >'0'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
          $sql = "SELECT * FROM matched WHERE emailg = '$Email' AND popid >'0'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $day = $row['a'];
          $date = date('d-m-Y H:m:s');
$now = time("$date"); // or your date as well
$your_date = strtotime("$day");
$hourdiff = round((strtotime($date) - $your_date)/3600, 1);
$tp = 12 - $hourdiff;
          
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
$sql = "SELECT * FROM pghtable WHERE email = '$Email'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $balance = $row['amountgh'];
          $providing = $row['amountph'];
          $cash=$balance/1000;
          $cas=round($cash);
          $ca=$cas*1000;
        
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
            
   echo"";         
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
            <a href="po.php" class="logo">PER <span class="lite">FUNDS</span>WALLET</a>
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
          </div>
      </aside>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-table"></i> <?php echo $name;?></h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="po.php">Home</a></li>
            <li><i class="fa fa-table"></i>Transaction</li>
            <li><i class="fa fa-th-list"></i>PH/GH</li>
          </ol>
        </div>
      </div>
              <!-- page start-->
               <!--modal start-->
                      <section class="panel">
                          <header class="panel-heading">
                              Modal Dialogs
                          </header>
                          <div class="panel-body">
                                <a class="btn btn-success" data-toggle="modal" href="#myModal">
                                  Cash Out <?php echo $balance;?>
                              </a>
                             
                        <a class="btn btn-danger" data-toggle="modal" href="#myModal3">
                                  About Referal!
                              </a>
                              <!-- Modal -->
                              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Cash Out</h4>
                                          </div>
                                          <div class="modal-body">

                                             Are you sure you want to cash out #<?php echo $ca;?>

                                          </div>
                                          <div class="modal-footer"><form method=post>
                                              <input type=hidden value=<?php echo $Email;?> name="Email"><input type=hidden value=<?php echo $ca;?> name="amountgh">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-success" type="submit">Yes</button></form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Amount to PH</h4>
                                          </div>
                                          <div class="modal-body">
                                              10000(min.)-500000(max.)
<form class="form-signin" method="post">
    <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($imsg)){ ?><div class="alert alert-warning" role="alert"> 
<?php echo $imsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
                                             <input type=hidden value=<?php echo $Email;?> name=Email>
                                             <input type=text placeholder=Amount name=amountph>e.g 10000 (no comma)

                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button class="btn btn-success" type="submit"> Proceed</button>
                                             
                                          </div>
                                           </form>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->
                              <!-- Modal -->
                              <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">NOTICE.</h4>
                                          </div>
                                          <div class="modal-body">

                                              Referal Bonuses are not cashed out seperately. they are added together to your balance, so You have one balance.

                                          </div>
                                          <div class="modal-footer">
                                              <button data-dismiss="modal" class="btn btn-danger" type="button"> Ok</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->

                          </div>
                      </section>
                      <!--modal start-->
            
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                                                            PROVIDE HELP<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> 
<?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($imsg)){ ?><div class="alert alert-warning" role="alert"> 
<?php echo $imsg; ?> </div><?php } ?>
   
   <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> 
<?php echo $fmsg; ?> </div><?php } ?>
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>NAME</th>
                                  <th>PHONE</th>
                                  <th>TIME</th>
                                  <th>AMOUNT</th>
                                  <th>BANK NAME</th>
                                  <th>ACCOUNT NAME</th>
                                  <th>ACCOUNT NUMBER</th>
                                  <th>ACTION</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
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
             
                echo '
                              <tr>
                                  <td>#</td>
                                  <td>' .$nameg. '</td>
                                  <td>' .$Phoneg. '</td>
                                  <td>' .$amount. '</td>
                                  <td>' .$bankname. '</td>
                                  <td>' .$bankacname. '</td>
                                  <td>' .$bankacnumber. '</td><td><a href="' .$pop. '">POP</a></td>
                                </tr>
      ';
         }else{
         if ($t < 1) {

    $sql = "UPDATE register SET blocked='0' WHERE email ='$emailp'";
if ($conn->query($sql) === TRUE){
    echo "";
  }

    $sql = "SELECT email, blocked FROM register WHERE email='" . $_SESSION["email"] . "' AND 
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
        echo '<tr>
                                  <td>#</td>
                                  <td>' .$nameg. '</td>
                                  <td>' .$Phoneg. '</td>
                                  <td><font color=red>' .$t. 'hrs(remaining)</font></td>
                                  <td>' .$amount. '</td>
                                  <td>' .$bankname. '</td>
                                  <td>' .$bankacname. '</td>
                                  <td>' .$bankacnumber. '</td><td><div class="btn-group">
                                     <form class="form-signin" method="post">
          <input type=hidden value="' . $Email . '" name="Emailop">
        <input class="button2 button2" type=hidden value="' . $emailg . '" 

name="emaiop">
             <input  type="file" name="pop">
                                      <button class="btn btn-primary" type="submit"> Upload</button></form>
                                  </div></td>
                                </tr>';}
     
     
}

      
}
}
}
                                  ?>
                                  
                             
                                
                              </tbody>
                            </table>
                          </div>

                      </section>
                      
                       <section class="panel">
                          <header class="panel-heading">
                              GET HELP
                          </header>
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>NAME</th>
                                  <th>PHONE</th>
                                  <th>TIME</th>
                                  <th>AMOUNT</th>
                                  <th>BANK NAME</th>
                                  <th>ACCOUNT NAME</th>
                                  <th>ACCOUNT NUMBER</th>
                                  <th>ACTION</th>
                                  
                                </tr>
                              </thead>
                              <tbody>
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
$sql = "SELECT * FROM matched WHERE emailg = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows < 1 ) {
    $sql = "SELECT * FROM matched WHERE emailp = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows < 1 ) {
   
    
}
}
$sql = "SELECT * FROM matched WHERE emailg = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
// Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  
$sql = "SELECT * FROM matched WHERE emailg = '" . $_SESSION["email"] . "'";
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

            
}
$sql = "SELECT * FROM matched WHERE emailg = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0 ) {
// Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
    
        
                    $sql = "SELECT * FROM matched WHERE emailg = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
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
$sql = "SELECT * FROM matched WHERE emailg='$emailg' AND emailp='$Emailp'";
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
  $sql = "DELETE FROM matched WHERE emailg='$Email' AND emailp='$Emailp'";
if ($conn->query($sql) === TRUE) {
  $smsg="A transaction has been confirmed automatically";
}
              
              //auto confirmation ends
              
          }
     echo '             <tr>
                                  <td>#</td>
                                  <td>' .$namep. '</td>
                                  <td>' .$Phonep. '<a href="' .$pop. '">View POP</a></td>
                                  <td><font color=red>' .$tp. ' hrs (remaining to confirm)</font></td>
                                  <td>' .$amount. '</td>
                                  <td>NIL</td>
                                  <td>NIL</td><td><div class="btn-group">
                                     <form class="form-signin"  method="post">
        <input type=hidden value="' .$Email. '" name="Emailc">
        <input  type=hidden value="' .$emailp. '" 

name="emai">
           
                                      <button class="btn btn-success" type="submit"> Confirm</button></form>
                                        <form class="form-signin"  method="post">
        <input type=hidden value="' .$Email. '" name="Emailr">
        <input  type=hidden value="' .$emailp. '" 

name="emair">
                                  </div><button class="btn btn-danger" type="submit"> Report Pop</button></form></td>
                                </tr>
       
      
     
       ';
      }elseif ($t < 1) {

            $sql = "UPDATE register SET blocked='0' WHERE email ='$emailp'";
if ($conn->query($sql) === TRUE){
    echo "";
  }

    $sql = "SELECT email,blocked FROM register WHERE email='$emailp' AND 
blocked='0'";
$result = $conn->query($sql);
if ($result = $conn->num_rows == 0) {
  echo '<script>window.location = 

"blocked.php"</script>';
}
             $sql = "SELECT * FROM pghtable WHERE email = '" . $_SESSION["email"] . "'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
          $amountgh = $row['amountgh'];
          $update = $amountgh+$amount;
}
   $sql = "DELETE FROM matched WHERE emailp='$emailp' AND 

emailg='" . $_SESSION["email"] . "'";
if ($conn->query($sql) === TRUE) {
    echo "";
}
$sql = "UPDATE pghtable SET amountgh='$update' WHERE email='" . $_SESSION["email"] . "'";
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
           echo '
         <tr>
                                  <td>#</td>
                                  <td>' .$namep. '</td>
                                  <td>' .$Phonep. '</td>
                                  <td><font color=red>' .$t. 'hrs(remaining)</font></td>
                                  <td>' .$amount. '</td>
                                  <td>NIL</td>
                                  <td>NIL</td>
                                  <td>NIL</td><td><div class="btn-group">
                                                                         <form class="form-signin"  method="post">
        <input type=hidden value="' .$Email. '" name="Emailc">
        <input  type=hidden value="' .$emailp. '" 

name="emai">
           
                                      <button class="btn btn-success" type="submit"> Confirm</button></form><form class="form-signin"  method="post">
        <input type=hidden value="' .$Email. '" name="Emailr">
        <input  type=hidden value="' .$emailp. '" 

name="emair">
                                  </div><button class="btn btn-danger" type="submit"> Report Pop</button></form></td>
                                </tr>
       
      
      ';
      }
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
            
}
                   
            

}
}


?>
                                  
                             
                                
                              </tbody>
                            </table>
                          </div>

                      </section>
                      
                  </div>
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
                <a href="">Core Hosts</a> by <a href="" style="margin-right: 20px;">DBNI 08063786699</a>
            </div>
        </div>
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nicescroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>


  </body>
</html>
