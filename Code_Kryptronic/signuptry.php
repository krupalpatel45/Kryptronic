<!--<?php
$validate = true;
$error = "";
$reg_Email = "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/";
$reg_Pswd = "/^(\S*)?\d+(\S*)?$/";
$reg_Bday = "/^\d{1,2}\/\d{1,2}\/\d{4}$/";
$reg_firstname = /^[a-zA-Z0-9_-]+$/;
$reg_lastname = /^[a-zA-Z0-9_-]+$/;

$email = "";
$date = "mm/dd/yyyy";
$firstname = "";
$lastname = "";
$password = "";


if (isset($_POST["submit"]))
{
  $email = trim($_POST["email"]);
  $date = trim($_POST["bday"]);
  $password = trim($_POST["pswd"]);
  $firstname = trim($_POST["fname"]);
  $lastname = trim($_POST["lname"]);

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

  $q1 = "SELECT * FROM User WHERE email = '$email'";
  $r1 = $db->query($q1);

  // if the email address is already taken.
  if($r1->num_rows > 0)
  {
      $validate = false;
  }
  else {
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
  }

  if($validate == true)
  {
      $dateFormat = date("Y-m-d", strtotime($date));
      //add code here to insert a record into the table User;
      // table User attributes are: email, password, DOB
      // variables in the form are: email, password, dateFormat,
      // start with $q2 =
      $q2 = "INSERT INTO profile (first_name, last_name, DOB, email, password, image_location) VALUES ('$firstname', '$lastname','$dateFormat','$email','$password' ,'$filepath')";

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
-->
