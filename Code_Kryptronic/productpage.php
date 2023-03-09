<!DOCTYPE html>
<html class="back">
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">

<script type="text/javascript" src="validation.js"></script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Product: Samsung S9</title>

</head>
<body>

<header>
  <div class = "logo">
    <a href="homepage.html"><img src="logo.jpg" alt="logo" style = "display:inline" width="200" height="200"></a>
  </div>
  <div class = "example">
  <input type="text" class="login_input" placeholder="Search.." name="search">
  </div>
</header>


<nav id="wish_list">
  <ul>
    <li><a href="homepage.php">Home</a></li>
    <li><a href="phones.php">Phones</a></li>
    <li><a href="tablet.php">Tablet</a></li>
    <li><a href="watch.php">Smart Watch</a></li>
    <li><a href="accessories.php">Accessories</a></li>
    <li><input type="button" ><a href = "profilepage.php" ><img src="profileicon.png" alt="profileico" width="30" height="30"></a></input></li>
  </ul>
</nav>


<div class="row">
<div class = "column">


<?php


$id = $_GET['new_p'];
$db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
if ($db->connect_error)
{
    die ("Connection failed: " . $db->connect_error);
}

$sql = "SELECT new_p, prod_name, price, prod_location FROM new_prod WHERE new_p =$id " ;
$result = mysqli_query($db, $sql);

 if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
session_start();
        echo " ". $row["prod_name"]. " - Price: " . $row["price"]. "</p><img src  = " . $row["prod_location"]. "><hr>";
    }
} else {
    echo "0 results";
}

  $e = $_SESSION["email"];
if(isset($_POST["cart"]))
{


  $q = "INSERT INTO wishlist (email, new_p) VALUES ('$e', '$id')";
  $r = $db->query($q);
  if ($r === true)
  {
      header("Location: welcomepage.php");
      $db->close();
      exit();
  }
}


mysqli_close($db);
?>

</div>
<section>
<div class="column">
  <?php
       session_start();

       //If nobody is logged in, display login and signup page.
       if(isset($_SESSION["email"]))
       {

           //If somebody is logged in, display a welcome message
         echo "<h2>LOGGED IN , </h2> <br /><br/>" ;
         echo "Welcome,  " .$_SESSION['email']. "<br /><br/>" ;
                   echo "<a href='homepage.php'>Logout</a>";
       }

       else
       {
         echo "<H3>Please Login or Sign up</h3>";
         echo "<a href='homepage.php'>Login</a> <a href='signup.php'>Signup</a>";

       }
     ?>
   </div>
 </section>
</div>
<form  method="post">

<div class="buyproduct">
  <h1>Buy Item:</h1>
  <p>Quantity:
       <input class="quantity_prod" type="number" required="" min="1" max="99" value="1"></p>
 <a href = "cartpage.html"><input class="cart" style="font-size:14px" value ="Add to Cart" /></a></input>
  <br/>
  <input  type ="submit" data-id="Samsung Galaxy S9" name ="cart" class="cart" style="font-size:14px" value ="Add to wishlist"></input>
</div>
</form>

<hr>
<h1>Recommendations: </h1>

<div class="gallery">
  <a href="productpage.html" img src="appleseries3.jpg" alt="Apple watch" width="600" height="400">
    <img src="appleseries3.jpg" alt="Apple Watch" width="600" height="400">
  </a>
  <div class="desc">Apple Series3 : Avaliable in 32GB, With GPS compatibality/ Cellular.</div>
</div>


<div class="gallery">
  <a target="_blank" href="iphone6s.jpg">
    <img src="iphone6s.jpg" alt="Iphone 6s(Gold)" width="600" height="400">
  </a>
  <div class="desc">Apple Iphone 6S: Avaliable in 32GB, 64GB.</div>
</div>

<div class="gallery">
  <a target="_blank" href="lg7.jpg">
    <img src="lg7.jpg" alt="LG G7" width="600" height="400">
  </a>
  <div class="desc">LG G7 : Avaliable in 16GB, 32GB, 64GB.</div>
</div>


<div class="gallery">
  <a target="_blank" href="iphonex.jpg">
    <img src="iphonex.jpg" alt="Apple IphoneX" width="600" height="400">
  </a>
  <div class="desc">Apple IphoneX: Avaliable in 64GB, 128GB.</div>
</div>





<footer>
    <div id="privacy">
        Kryptronic template © 2018 Privacy Policy<br />
        <p>Contact information: <a href="krupalpatel1998@gmail.com">krupalpatel1998@gmail.com</a>.</p>
    </div>
</footer>

<script> document.body.addEventListener("load", remove(), false);</script>
<script src="validation.js"></script>

</body>
</html>
