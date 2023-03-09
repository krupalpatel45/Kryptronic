<?php
/// Create connection
$conn = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$sql = "CREATE TABLE wishlist (
wishlist_id INT NOT NULL AUTO_INCREMENT,
email VARCHAR(255) NOT NULL,
new_p INT NOT NULL,
catagory_id INT NOT NULL,
FOREIGN KEY (email) REFERENCES profile (email),
FOREIGN KEY (new_p) REFERENCES new_prod (new_p),
FOREIGN KEY (catagory_id) REFERENCES catagories (catagory_id),
PRIMARY KEY (wishlist_id)
)";


if ($conn->query($sql) === TRUE) {
    echo "Table profile created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
