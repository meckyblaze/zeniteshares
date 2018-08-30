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
$sql = "CREATE TABLE register (
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(60) NOT NULL,
email VARCHAR(60) NOT NULL,
phone VARCHAR(60) NOT NULL,
password VARCHAR(60) NOT NULL,
bank VARCHAR(60) NOT NULL,
bankacname VARCHAR(60) NOT NULL,
bankacnumber VARCHAR(60) NOT NULL,
verify VARCHAR(60) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table register created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 