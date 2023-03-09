










<!DOCTYPE html>
<html class="signupback">
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">

<script type="text/javascript" src="validation.js"></script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Add/Remove Catagory</title>

</head>
<body>

<h3 id="catagory">Add a  catagory here:</h3>

<hr>
    <input type="text" placeholder="Category..."name="catagory" size="30" /><button type="submit" >Save</button>

<hr>
<div>
<h3>Catagories: </h3>
<ul>
  <li>Phone : <button data-id="Phone" class="cancelbtn">Delete</button></li>
  <hr><li>Tablet : <button data-id="Tablet"class="cancelbtn">Delete</button></li>
  <hr><li>Smart-watch : <button data-id="Smart-Watch" class="cancelbtn">Delete</button></li>
  <hr><li>Accessories : <button data-id="Accessories" class="cancelbtn">Delete</button></li>
</div>

<script> document.body.addEventListener("load", remove(), false);</script>
<script src="validation.js"></script>


</body>
</html>
