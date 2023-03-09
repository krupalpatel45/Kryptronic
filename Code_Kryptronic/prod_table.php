<?php
/// Create connection
$conn = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "CREATE TABLE new_prod (
new_p INT NOT NULL AUTO_INCREMENT,
prod_name VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL,

prod_location VARCHAR(255) NOT NULL,

PRIMARY KEY (new_p)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table profile created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
