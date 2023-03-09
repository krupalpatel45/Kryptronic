

<!DOCTYPE html>
<html class="back">
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">

<script type="text/javascript" src="validation.js"></script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Cartpage: </title>

</head>
<body>

<header>
  <div class = "logo">
      <a href="homepage.php"><img src="logo.jpg" alt="logo" style = "display:inline" width="200" height="200"></a>
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
  <div class="column">
    <img src="s9.gif" alt="Samsung Galaxy S9" style = "display:inline" width="550" height="530">
  </div>
<div class="column">

<form action ="cartpage.php" method="post">
  <p>
  <input  type ="submit" data-id="Samsung Galaxy S9" name ="cart" class="cart" style="font-size:14px" value ="Add to wishlist"></input>
  <button data-id ="Samsung Galaxy S9" class= cancelbtn>Remove</button>
</p>
</form>


</div>
  <div class="buyproduct">
    <table>
      <tr>
        <th>Item: </th>
        <td>Samsung Galaxy S9 </td>
      </tr>
      <tr>
        <br/>
        <th>Quantity: </th>
        <td><input type="number" class="quantity_prod" min="1" max="99"value="1"></td>
      </tr>

  </table>
<hr>

<div id ="total"></div>

  <button class="cart" style="font-size:14px">Checkout</button>
  <div>
  <button class="cart" style="font-size:14px"><a href="homepage.html">Keep Shopping</button></div>
</div>
</div>
<hr>
<h1>Recommendations: </h1>

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


<div class="gallery">
  <a target="_blank" href="iphone6s.jpg">
    <img src="iphone6s.jpg" alt="Iphone 6s(Gold)" width="600" height="400">
  </a>
  <div class="desc">Apple Iphone 6S: Avaliable in 32GB, 64GB.</div>
</div>

<div class="gallery">
  <a href="productpage.html" img src="appleseries3.jpg" alt="Apple watch" width="600" height="400">
    <img src="appleseries3.jpg" alt="Apple Watch" width="600" height="400">
  </a>
  <div class="desc">Apple Series3 : Avaliable in 32GB, With GPS compatibality/ Cellular.</div>
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
