<?php

$validate = true;
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";

$email = "";
$error = "";

if (isset($_POST["submit"]))
{
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    //add code here to select * from table User where email = '$email' AND password = '$password'
    // start with $q =
    $q = "SELECT * FROM profile WHERE email = '$email' AND password = '$password'";
    $r = $db->query($q);
    $row = $r->fetch_assoc();
    if($email != $row["email"] && $password != $row["password"])
    {
        $validate = false;
    }
    else
    {
        $emailMatch = preg_match($reg_Email, $email);
        if($email == null || $email == "" || $emailMatch == false)
        {
            $validate = false;
        }

        $pswdLen = strlen($password);
        $passwordMatch = preg_match($reg_Pswd, $password);
        if($password == null || $password == "" || $pswdLen < 8 || $passwordMatch == false)
        {
            $validate = false;
        }
    }

    if($validate == true)
    {

        session_start();
        $_SESSION["email"] = $row["email"];
        header("Location: welcomepage.php");
        $db->close();
        exit();
    }
    else
    {
        $error = "The email/password combination was incorrect. Login failed.";
        $db->close();
    }
}

?>


<!DOCTYPE html>
<html class="back">
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<script type="text/javascript" src="validation.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Smart-Watches</title>

</head>
<body>

<header>
  <div class = "logo">
      <a href="homepage.php"><img src="logo.jpg" alt="logo" style = "display:inline" width="200" height="200"></a>
  </div>

  <div class = "example">
    <input type="text" class="login_input" placeholder="Search.." name="search" />
  </div>
</header>


<nav>
  <li><a href="homepage.php"  >Home</a></li>
  <li><a href="phones.php">Phones</a></li>
  <li><a href="#tablet.php">Tablet</a></li>
  <li><a href="#watch">Smart Watch</a></li>
  <li><a href="accessories.php">Accessories</a></li>
  <li><input type="button" ><a href = "profilepage.php" ><img src="profileicon.png" alt="profileico" width="30" height="30"></a></input></li>
</nav>

<section>
<form id="login" action ="homepage.php" method="post">
<h2>Login </h2>

  <div class="container">
    <br/>
    <label id= "email_msg" class= "err_msg" ></label><br/>
    <input type="text" class="login_input"  placeholder="Enter Username" name="email" size="10" />
<br/>
    <label id= "pswd_msg" class= "err_msg" ></label><br/>
    <input type="password"class="login_input"  placeholder="Enter Password" name="password"size="10" />
    <button type="submit" class = "signupbtn" name ="submit">Login</button>

    <label>
      <input type="checkbox" checked="checked" name="remember" /> Remember me
    </label>
  </div>

</form>
<script>document.getElementById("login").addEventListener("submit", loginform, false);</script>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
  <a href = "signup.php"><input type= "button" class = "signupbtn" value = "signup"></a></input>
    <div class="psw">Forgot <a href="#">password?</a></div>
  </div>

</section>



<h1>Smart - Watch</h1>

<div id="phone" class="gallery">
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

        $_SESSION['id']= $row['catagory_id'];
        $catagory_id =  $_SESSION['id'];

        echo "<a href = 'allproducts.php?catagory_id=$catagory_id'>";

          echo " ". $row["prod_name"]. " - Price: " . $row["price"]. "</p><img src  = " . $row["prod_location"]. "><hr>";
      }
  } else {
      echo "0 results";
  }


  mysqli_close($db);
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
