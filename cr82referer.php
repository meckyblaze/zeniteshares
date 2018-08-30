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
$sql = "CREATE TABLE referer (
id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
referer VARCHAR(60) NOT NULL,
no VARCHAR(60) NOT NULL,
a VARCHAR(60) NOT NULL,
b VARCHAR(60) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table referer created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 