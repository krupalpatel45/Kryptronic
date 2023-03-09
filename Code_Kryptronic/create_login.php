<?php
/// Create connection
$conn = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "CREATE TABLE profile (
user_id INT NOT NULL AUTO_INCREMENT
first_name VARCHAR(30) NOT NULL,
last_name VARCHAR(30) NOT NULL,
DOB DATE NOT NULL,
email VARCHAR(255) NOT NULL,
password VARCHAR(30) NOT NULL,
image_location VARCHAR(255) NOT NULL,

PRIMARY KEY (user_id)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table profile created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
