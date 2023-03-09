<?php
$validate = true;
$error = "";
$reg_firstname = "/^[a-zA-Z0-9_-]+$/";
$reg_lastname = "/^[a-zA-Z0-9_-]+$/";
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
$reg_Bday = "/^\d{1,2}\/\d{1,2}\/\d{4}$/";
$firstname = "";
$lastname = "";
$email = "";
$date = "mm/dd/yyyy";
$password = "";




if (isset($_POST["submit"]))
{
    $firstname =  trim($_POST["name"]);
    $lastname =  trim($_POST["uname"]);
    $email = trim($_POST["email"]);
    $date = trim($_POST["bday"]);
    $password = trim($_POST["pswd"]);

    $db = new mysqli("localhost", "kpg511", "Krupal98", "kpg511");

    $filetemp = $_FILES['img']['tmp_name'];
    $filename = $_FILES['img']['name'];
    $filetype = $_FILES['img']['type'];
    $filepath = "uploads/".$filename;
    move_uploaded_file($filetemp, $filepath);




    if ($db->connect_error)
    {
        die ("Connection failed: " . $db->connect_error);
    }

    $q1 = "SELECT * FROM profile WHERE  email = '$email'";
    $r1 = $db->query($q1);

    // if the email address is already taken.
    if($r1->num_rows > 0)
    {
        $validate = false;
    }
    else
    {

      $firstMatch = preg_match($reg_firstname, $firstname);
      if($firstname == null || $firstname == "" || $firstMatch == false)
      {
          $validate = false;
      }

      $lastMatch = preg_match($reg_lastname, $lastname);
      if($lastname == null || $lastname == "" || $lastMatch == false)
      {
          $validate = false;
      }

      $emailMatch = preg_match($reg_Email, $email);
      if($email == null || $email == "" || $emailMatch == false)
      {
          $validate = false;
      }


      $pswdLen = strlen($password);
      $pswdMatch = preg_match($reg_Pswd, $password);
      if($password == null || $password == "" || $pswdLen< 8 || $pswdMatch == false)
      {
          $validate = false;
      }

      $bdayMatch = preg_match($reg_Bday, $date);
      if($date == null || $date == "" || $bdayMatch == false)
      {
          $validate = false;
      }
  }

    if($validate == true)
    {
        $dateFormat = date("Y-m-d", strtotime($date));
        //add code here to insert a record into the table User;
        // table User attributes are: email, password, DOB
        // variables in the form are: email, password, dateFormat,
        // start with $q2 =
        $q2 = "INSERT INTO profile (first_name, last_name, DOB, email, password, image_location) VALUES ('$firstname','$lastname','$dateFormat','$email','$password', '$filepath')";

        $r2 = $db->query($q2);

        if ($r2 === true)
        {
            header("Location: homepage.html");
            $db->close();
            exit();
        }
    }
    else
    {
        $error = "email address is not available. Signup failed.";
        $db->close();
    }

}
?>





<!DOCTYPE html>
<html class="signupback">
<head>
<title>SignUp Page</title>

<link rel="stylesheet" type="text/css" href="mystyle.css" />

<script type="text/javascript" src="validation.js"></script>
</head>

<body>

<header>
  <div class = "logo">
      <a href="homepage.html"><img src="logo.jpg" alt="logo" style = "display:inline" width="200" height="200"></a>
  </div>
  <div class = "example">
    <input type="text" class="login_input" placeholder="Search.." name="search" />
  </div>
</header>


<nav>
  <ul>
    <li><a href="homepage.php">Home</a></li>
    <li><a href="phones.php">Phones</a></li>
    <li><a href="tablet.php">Tablet</a></li>
    <li><a href="watch.php">Smart Watch</a></li>
    <li><a href="accessories.php">Accessories</a></li>
    <li><input type="button" ><a href = "profilepage.php" ><img src="profileicon.png" alt="profileico" width="30" height="30"></a></input></li>
  </ul>
</nav>


<div class="center">

<h3 >Sign Up Page</h3>

<form id="SignUp"  action="signup.php" method="post"  enctype="multipart/form-data">

<br/>
    <label id= "first_msg" class= "err_msg" ></label>
    <input type="text" name="name" size="30" placeholder="First Name:" />
<br/>
    <label id= "last_msg" class= "err_msg" ></label>
    <input type="text" name="uname" size="30" placeholder="Last name:" />
<br/>
    <label id= "email_msg" class= "err_msg" ></label>
    <input type="text" name="email" size="30" placeholder="Email:"/>
<br/>
    <label id= "birthday_msg" class= "err_msg" ></label>
    <input type="text" name="bday" value="mm/dd/yyyy"/>
<br/>
    <label id= "pswd_msg" class= "err_msg" ></label>
    <input type="password" name="pswd" size="30" placeholder="Password:"/>
<br/>
    <label id= "pswr_msg" class= "err_msg" ></label>
    <input type="password" name="pswdr" size="30" placeholder="Confirm Password:" />
<br/>
<input type= "file" name="img" accept="image/*"/>
  <p>
    <input type="submit" name="submit" value="SignUp"/>
    <input type="reset" name="Reset" value="Reset" />
  </p>

</form>
<script>document.getElementById("SignUp").addEventListener("submit", signupform, false);</script>
<p><a href = "homepage.php">Back to Homepage</a></p>

</div>

<footer>
    <div id="privacy">
        Kryptronic template © 2018 Privacy Policy<br />
        <p>Contact information: <a href="krupalpatel1998@gmail.com">krupalpatel1998@gmail.com</a>.</p>
    </div>
</footer>

</body>
</html>
