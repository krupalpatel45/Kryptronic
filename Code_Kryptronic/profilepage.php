<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">

<script type="text/javascript" src="validation.js"></script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>User Profile Page</title>

</head>
<body>
  <header>
    <div class = "logo">
  <a href="homepage.html"><img src="logo.jpg" alt="logo" style = "display:inline" width="200" height="200"></a>
  </div>
  <div class = "example">
    <input type="text" class="login_input"placeholder="Search.." name="search">
  </div>
  </header>

  <nav>
    <li><a href="welcomepage.php"  >Home</a></li>
    <li><a href="phones.php">Phones</a></li>
    <li><a href="tablet.php">Tablet</a></li>
    <li><a href="smartwatch.php">Smart Watch</a></li>
    <li><a href="accessories.php">Accessories</a></li>
  </nav>


  <div class="card">

    <h2>Your Account</h2>


        <?php

        $id = $_GET['user_id'];
        // Create connection
        $db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
        if ($db->connect_error)
        {
            die ("Connection failed: " . $db->connect_error);
        }


        $sql = "SELECT user_id, first_name, last_name, DOB, email, image_location FROM profile WHERE user_id =$id";
        $result = mysqli_query($db, $sql);

         if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
      ?>

    <?php echo "<h1><img src  =" .$row["image_location"]." ></h1>";?>
    <table class"profileinfo">
      <tr>
        <td>Email: </td>
        <?php echo "<td>". $row["email"]." </td>";?>
      </tr>
      <tr>
      <td>Name: </td>
      <?php echo "<td>". $row["first_name"]." </td>";?>
      </tr>
      <tr>
        <td>D.O.B: </td>
      <?php echo "<td>". $row["DOB"]." </td>";?>
      </tr>
      <tr>
        <td>Password: </td>
        <td> **********</td>
      </tr>
      </table>

  <?php
  }
} else {
  echo "0 results";
}

mysqli_close($db);
?>
    <div><a href = "signup.php"><input type= "button" class = "signupbtn" value = "Edit"></a></input></div>
    <div><a href = "homepage.php"><button class="cancelbtn">Logout</button></a></div>
  </div>



<hr>
<div class="row">
  <h2>Your Wishlist</h2>

  <?php
  $d = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
  if ($d->connect_error)
  {
      die ("Connection failed: " . $d->connect_error);
  }

  $s = "SELECT new_prod.new_p, new_prod.prod_name, new_prod.price, new_prod.prod_location,new_prod.catagory, new_prod.quantity, wishlist.new_p FROM new_prod RIGHT JOIN wishlist ON new_prod.new_p = wishlist.new_p";
  $re = mysqli_query($d, $s);

   if (mysqli_num_rows($re) > 0) {
      // output data of each row
      while($o = mysqli_fetch_assoc($re)) {
?>



    <div class="column">
    <?php echo "<img width = \"240\" height = \"220\" src  = ". $o["prod_location"].">";  ?>
    </div>
  <div class="column">
    <h2><?php echo "" . $o["prod_name"]."";  ?></h2>

    <p class="productheading">Description: </P>
    <p>Take a call when you’re out on the water. Ask Siri to send a message. Stream your favourite songs on your run. And do it all while leaving your phone behind. Apple Watch Series 3 with cellular. Now you have the freedom to go with just your watch.</P>
<hr>
    <P><?php echo "" . $o["price"]."";  ?>
      <p>Quantity: <?php echo "" . $o["quantity"]."";  ?></p>
      <p>Catagory: <?php echo "" . $o["catagory"]."";  ?></p>
    <div><button class=cancelbtn>Remove</button></div></p>
</div>
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


<script> document.body.addEventListener("load", remove(), false);</script>
<script src="validation.js"></script>
</body>
</html>
