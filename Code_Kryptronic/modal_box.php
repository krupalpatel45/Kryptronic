<!DOCTYPE html>
<html class="back">
<head>
<link rel="stylesheet" type="text/css" href="modal_box.css">

<script type="text/javascript" src="modal_ajax.js"></script>



</br>
</br>

<h1>PHONES</h1>
</br>
</br>
<?php


// Create connection
$db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
if ($db->connect_error)
{
    die ("Connection failed: " . $db->connect_error);
}


$sql = "SELECT catagory_id, prod_name, price, prod_location FROM catagories WHERE catagory = 'phones'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

      echo "<a class=\"open-lightbox\" href=".$row["prod_location"].  ">";

      echo "<img width = \"240\" height = \"220\" src  = " . $row["prod_location"]. "></a>";
    }
} else {
    echo "0 results";
}


mysqli_close($db);
?>

</br>
</br>
<h1>TABLET</h1>
</br>
</br>
<?php


// Create connection
$db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
if ($db->connect_error)
{
    die ("Connection failed: " . $db->connect_error);
}


$sql = "SELECT catagory_id, prod_name, price, prod_location FROM catagories WHERE catagory = 'tablet'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

      echo "<a class=\"open-lightbox\" href=".$row["prod_location"]. ">";

      echo  "<img width = \"250\" height = \"200\" src  = " . $row["prod_location"]. "></a>";
    }
} else {
    echo "0 results";
}


mysqli_close($db);
?>

</br>
</br>
<h1>SMART - WATCH</h1>
</br>
</br>
<?php


// Create connection
$db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
if ($db->connect_error)
{
    die ("Connection failed: " . $db->connect_error);
}


$sql = "SELECT  catagory_id, prod_name, price, prod_location FROM catagories WHERE catagory = 'smartwatch'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        echo "<a class=\"open-lightbox\" href=".$row["prod_location"]. ">";
        echo "<img width = \"200\" height = \"200\" src  = " . $row["prod_location"]. "></a>";
    }
} else {
    echo "0 results";
}


mysqli_close($db);
?>

</br>
</br>
<h1>ACCESSORIES</h1>
</br>
</br>
<?php


// Create connection
$db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
if ($db->connect_error)
{
    die ("Connection failed: " . $db->connect_error);
}


$sql = "SELECT catagory_id, prod_name, price, prod_location FROM catagories WHERE catagory = 'accessories'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

      echo "<a class=\"open-lightbox\" href=".$row["prod_location"]. ">";
      echo"<img width = \"250\" height = \"200\" src  = " . $row["prod_location"]. "></a>";
    }
} else {
    echo "0 results";
}


mysqli_close($db);
?>



</body>
</html>
