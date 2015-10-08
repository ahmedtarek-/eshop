<!DOCTYPE>
<?php

  include ("functions/functions.php");
  $username="root";
  $password="";
  $database="eshop";
  $response="";
  $avatar = "";
  mysql_connect("localhost", $username,$password);
  @mysql_select_db($database) or die("Unable to select database");

  if(isset($_POST['signup'])) {
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['user_pass']);
    $confirm_pass = htmlentities($_POST['user_pass_confirm']);
    $first_name = htmlentities($_POST['first_name']);
    $last_name = htmlentities($_POST['last_name']);
    $avatar = htmlentities($_POST['avatar']);
    if ($password != $confirm_pass)
      $response= "password does not match the confimed password";
    else {
      $response = "password is good";
      signUp($email, $password, $first_name, $last_name, $avatar);
    }
  }
  else {
    $response = "never entered";
  }



?>

<html>
<head>
  <title>E-shop</title>

  <!-- {Bootstrap}-->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <!--<link rel="stylesheet" href="styles/style.css" media="all" />-->
</head>
<body>

  <div class="main_container">
<!--Header-->
    <div class="header_container"="header_container">


    </div>
<!--End Header-->

<!--Start menubar -->
    <div class="menubar">

      <ul class="nav nav-tabs">
        <li><a href="#">Home</a> </li>
        <li><a href="#">All Products</a></li>
        <li><a href="#">Cart</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">My Profile</a></li>
        <li>  <form class="navbar-search pull-left">
          <li>
            <div id="form">
              <form action="results.php" method="get" enctype="multipart/form-data">
                <input type="text" name="user_query" placeholder="search a product">
                <input type="submit" name="search" value="Search">
              </form></li>
            </ul>
          </div>

          <h2> Sign Up </h2> 
          <form action="" method="post">
            <input type="text" name="email" placeholder="email"></br>
            <input type="password" name="user_pass" placeholder="password"></br>
            <input type="password" name="user_pass_confirm" placeholder="confirm password"> </br>
            <input type="text" name="first_name" placeholder="John"></br>
            <input type="text" name="last_name" placeholder="mckain"></br>
            <input type="file" name="avatar" value="choose a photo">
            <input type="submit" name="signup" value="signup"></br>
          </form>
          <h2><?php 
            echo $response; 
            echo "</b> ";
          ?></h2>
          <h3><?php
            echo $email;
          ?></h3>
        </div>



</body>
</html>
