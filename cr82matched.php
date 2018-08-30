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
echo "Connected successfully";

// sql to create table
$sql = "CREATE TABLE matched (
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
namep VARCHAR(60) NOT NULL,
emailp VARCHAR(60) NOT NULL,
phonep VARCHAR(60) NOT NULL,
nameg VARCHAR(60) NOT NULL,
emailg VARCHAR(60) NOT NULL,
phoneg VARCHAR(60) NOT NULL,
amount VARCHAR(60) NOT NULL,
pop VARCHAR(60) NOT NULL,
popid VARCHAR(60) NOT NULL,
a VARCHAR(60) NOT NULL,
bank VARCHAR(60) NOT NULL,
bankacname VARCHAR(60) NOT NULL,
bankacnumber VARCHAR(60) NOT NULL,
date VARCHAR(60) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table matched created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 