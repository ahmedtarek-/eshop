<!DOCTYPE>
<?php
  
  include ("functions/functions.php");
  session_start();
  $username="root";
  $password="";
  $database="eshop";
  $response="empty";
  mysql_connect("localhost", $username,$password);
  @mysql_select_db($database) or die("Unable to select database");

  if(isset($_POST['signin'])) {
    $response="entered";
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['user_pass']);
    $correct_passwrod = checkUser($email);
    if (is_null($correct_passwrod)){
      echo "user does not exist";
      $response="user does not exist";
    }
    else {
      if ($correct_passwrod == $password) {
        $_SESSION['user'] = getId($email); 
        header('location: test.php');
        echo 'okaaaaaaaay';
        $response="okaaaaaaaay";
      }
      else {
        echo 'Wrong Password';
        $response=$correct_passwrod;
      }
    }
    //then you can use them in a PHP function. 
    //$result = myFunction($val1, $val2);
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
          </div>
          <h2> Sign In </h2> 
          <form action="" method="post">
          <input type="text" name="email" placeholder="email">
          <input type="password" name="user_pass" placeholder="password">
          <input type="submit" name="signin" value="signin">
          </form>
          <a href="register.php"><h5> don't have an account yet? </h5></a>
          <h2><?php 
            echo $response; 
          ?></h2>
          <h3><?php
            echo $email;
          ?></h3>
          
        

</body>
</html>
