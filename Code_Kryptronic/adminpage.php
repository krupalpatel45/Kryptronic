<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Administration Page</title>

</head>
<body>
  <header>
    <div class = "logo">
  <img src="logo.jpg" alt="logo" style = "display:inline" width="200" height="200">
  </div>
  <div class = "example">
    <input type="text" placeholder="Search.." name="search">
  </div>
  </header>

  <nav>
    <li><a href="homepage.php"  >Home</a></li>
    <li><a href="phones.php">Phones</a></li>
    <li><a href="tablet.php">Tablet</a></li>
    <li><a href="smartwatch.php">Smart Watch</a></li>
    <li><a href="accessories.php">Accessories</a></li>
  </nav>
<div class="row">
  <h2>Products Sold</h2>

    <?php
    $d = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
    if ($d->connect_error)
    {
        die ("Connection failed: " . $d->connect_error);
    }

    $s = "SELECT new_prod.new_p, new_prod.prod_name, new_prod.price, new_prod.prod_location,new_prod.catagory, new_prod.quantity, wishlist.new_p, wishlist.email FROM new_prod RIGHT JOIN wishlist ON new_prod.new_p = wishlist.new_p";
    $re = mysqli_query($d, $s);

     if (mysqli_num_rows($re) > 0) {
        // output data of each row
        while($o = mysqli_fetch_assoc($re)) {
  ?>



<div class="column">
    <?php echo "<img width = \"240\" height = \"220\" src  = ". $o["prod_location"].">";  ?>
</div>

    <table class="tablecontent">
      <tr>
        <th>User: </th>
        <td><?php echo "" . $o["email"]."";  ?> </td>
      </tr>
      <tr>
        <th>Item: </th>
        <td><?php echo "" . $o["prod_name"]."";  ?></td>
      </tr>
      <tr>
        <th>Quantity: </th>
        <td><?php echo "" . $o["quantity"]."";  ?></td>
      </tr>
      <tr>
        <th>Price: </th>
        <td><?php echo "" . $o["price"]."";  ?> </td>
      </tr>
      <tr>
        <th>Category: </th>
        <td><?php echo "" . $o["catagory"]."";  ?> </td>
      </tr>
        <hr>
  </table>
  </div>
        <div>
          <a href = "AorRcatagory.html"><input type= "button" class = "cancelbtn" value = "Add or Remove Catagory"></a></input>
            <a href = "Rproduct.php"><input type= "button" class = "signupbtn" value = "Register a new product"></a></input></div>
            <?php
          }
            }

            mysqli_close($d);


            ?>

</div>





<footer>
    <div id="privacy">
        Kryptronic template © 2018 Privacy Policy<br />
        <p>Contact information: <a href="krupalpatel1998@gmail.com">krupalpatel1998@gmail.com</a>.</p>
    </div>
</footer>

</body>
</html>
