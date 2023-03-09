<?php
/// Create connection
$conn = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "CREATE TABLE cart (
cart_id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
catagory_id INT NOT NULL,


FOREIGN KEY (user_id) REFERENCES profile (user_id),
FOREIGN KEY (catagory_id) REFERENCES catagories (catagory_id),
PRIMARY KEY (cart_id)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table profile created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
