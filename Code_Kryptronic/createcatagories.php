<?php
/// Create connection
$conn = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "CREATE TABLE catagories (
catagory_id INT NOT NULL AUTO_INCREMENT,
catagory VARCHAR(30) NOT NULL,
prod_name VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL,
prod_location VARCHAR(255) NOT NULL,

PRIMARY KEY (catagory_id)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table profile created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
