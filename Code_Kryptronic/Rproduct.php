<?
  $db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");
  if ($db->connect_error)
  {
      die ("Connection failed: " . $db->connect_error);
  }

if(isset($_POST["submit"])){
  $pname = trim($_POST["product_name"]);
  $price = trim($_POST["price"]);
    $catagory = trim($_POST["catagory"]);

  $quantity = trim($_POST["quant"]);


  $filetemp = $_FILES['pic']['tmp_name'];
  $filename = $_FILES['pic']['name'];
  $filetype = $_FILES['pic']['type'];
  $filepath = "new_products/".$filename;
  move_uploaded_file($filetemp, $filepath);

  $q2 = "INSERT INTO new_prod (prod_name,price, prod_location, quantity, catagory) VALUES ('$pname', '$price', '$filepath', '$quantity', '$catagory')";
    $q1 = "INSERT INTO catagories(catagory, prod_name,price, prod_location) VALUES ('$catagory','$pname', '$price', '$filepath')";
$r3 = $db->query($q1);
  $r2 = $db->query($q2);
  if ($r2 === true)
  {
      header("Location: modal_box.php");
      $db->close();
      exit();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<script type="text/javascript" src="validation.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Register Product Page</title>

</head>
<body>
<hr>

<form id="rproduct"  method="post"  enctype="multipart/form-data">
<h3>Register Product</h3>

<p>Product Title: <label  id="prod_title" class="err_msg"></label></p>
  <input  type="text" name="product_name" placeholder="Product Name" size="10">



<hr>
  <P>Enter Description Below:
  <label  id = "prod_desc" class= "err_msg"></label></p>
  <textarea onkey = "charcountupdate(this.value)" rows="4" cols="50" name="description" placeholder="Description & Specifications"></textarea>
<span id = "charcount"></span>
<hr>
  <p>Qualtity Avaliable:
  <label id="prod_quantity" class="err_msg"></label></p>
  <input type="number" name ="quant" required="" min="1" max="99" value="1">

<hr>
  <p>Unit Price:
  <label id="prod_price" class="err_msg"></label></p>
  <input type="number" name ="price" step="0.01" placeholder="$..." size="3" />
<br/>
<br/>
<hr/>

<input type="file" id="file" name="pic">


<hr>
<p>Catagory:</p>
  <input  type="text" name="catagory" placeholder="Catagories" size="10">

  <br/>
  <br/>
  <hr/>
  <br/>
  <br/>
  <input type="submit" name="submit" value="Submit"/>
</form>
<script>
var photo_size =  document.getElementById("file");
photo_size.addEventListener('change',function(){
  if(this.files[0].size>"2097125")
  {
    alert("Upload should be less than 2mb")
  preventDefault();
}
});



</script>
<script>document.getElementById("rproduct").addEventListener("submit", registerprod, false);</script>
</body>
</html>
