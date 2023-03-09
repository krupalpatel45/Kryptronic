
<script>
$(".form-item").submit(function(e){ //user clicks form submit button
    var form_data = $(this).serialize(); //prepare form data for Ajax post
    var button_content = $(this).find('button[type=submit]'); //get clicked button info
    button_content.html('Adding...'); //Loading button text //change button text

    $.ajax({ //make ajax request to cart_process.php
        url: "cart_process.php",
        type: "POST",
        dataType:"json", //expect json value from server
        data: form_data
    }).done(function(data){ //on Ajax success
        $("#cart-info").html(data.items); //total items count fetch in cart-info element
        button_content.html('Add to Cart'); //reset button text to original text
        alert("Item added to Cart!"); //alert user
        if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
            $(".cart-box").trigger( "click" ); //trigger click to update the cart box.
        }
    })
    e.preventDefault();
});


//Remove items from cart
$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
    e.preventDefault();
    var pcode = $(this).attr("data-code"); //get product code
    $(this).parent().fadeOut(); //remove item element from box
    $.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
        $("#cart-info").html(data.items); //update Item count in cart-info
        $(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
    });
});


//Show Items in Cart
$( ".cart-box").click(function(e) { //when user clicks on cart box
    e.preventDefault();
    $(".shopping-cart-box").fadeIn(); //display cart box
    $("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
    $("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
});

//Close Cart
$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
    e.preventDefault();
    $(".shopping-cart-box").fadeOut(); //close cart-box
});


</script>











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
        $_SESSION['id']= $row['user_id'];
        $user_id =  $_SESSION['id'];
        header("Location: profilepage.php?user_id=$user_id");
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


<title>Welcome to Kryptronic</title>

</head>
<body>

<header>
  <div class = "logo">
      <a href="welcomepage.php"><img src="logo.jpg" alt="logo" style = "display:inline" width="200" height="200"></a>
  </div>

  <div class = "example">
   <input type="text" class="login_input" placeholder="Search.." name="search" />

  </div>
</header>


<nav>
  <li><a href="welcomepage.php"  >Home</a></li>
  <li><a href="phones.php">Phones</a></li>
  <li><a href="tablet.php">Tablet</a></li>
  <li><a href="smartwatch.php">Smart Watch</a></li>
  <li><a href="accessories.php">Accessories</a></li>
<li><input type="button" ><a href = "profilepage.php" ><img src="profileicon.png" alt="profileico" width="30" height="30"></a></input></li>
</nav>

<section>
<form id="login" action ="welcomepage.php" method="post">

 <?php
      session_start();

      //If nobody is logged in, display login and signup page.
      if(isset($_SESSION["email"]))
      {
          //If somebody is logged in, display a welcome message
        echo "<h2> LOGGED IN ,</h2>  <br /><br/>" ;
        echo "Welcome,  " .$_SESSION['email']. "<br /><br/>" ;
                  echo "<a href='homepage.php'>Logout</a>";
      }

      else
      {
        echo "<H3>Please Login or Sign up</h3>";
        echo "<a href='homepage.php'>Login</a> <a href='signup.php'>Signup</a>";

      }
    ?>


</form>
<a href="#" class="cart-box" id="cart-info" title="View Cart">
<?php
if(isset($_SESSION["products"])){
    echo count($_SESSION["products"]);
}else{
    echo 0;
}
?>
</a>
<div class="shopping-cart-box">
<a href="#" class="close-shopping-cart-box" >Close</a>
<h3>Your Shopping Cart</h3>
    <div id="shopping-cart-results">
    </div>
</div>
<script>document.getElementById("login").addEventListener("submit", loginform, false);</script>

</section>



<h1>Phones</h1>

<div id="phone" class="gallery">
  <?php


  // Create connection
  $db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
  if ($db->connect_error)
  {
  		die ("Connection failed: " . $db->connect_error);
  }


  $sql = "SELECT new_p, prod_name, price, prod_location FROM new_prod";
  $result = mysqli_query($db, $sql);

   if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {


        $_SESSION['id']= $row['new_p'];
        $new_p =  $_SESSION['id'];

       echo "<a href = 'productpage.php?new_p=$new_p'>";

          echo " ". $row["prod_name"]. " - Price: " . $row["price"]. "</p><img src  = " . $row["prod_location"]. "><hr>";
echo "<a href = \"cartpage.php\"><input class=\"cart\" style=\"font-size:10px\" type =\"submit\" value =\"Add to Cart\" /></a></input>";
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
