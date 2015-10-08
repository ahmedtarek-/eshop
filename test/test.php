<!DOCTYPE>
<?php
  
  include ("functions/functions.php");
  session_start();
  $username="root";
  $password="";
  $database="eshop";
  $response="empty";
  mysql_connect(localhost, $username,$password);
  @mysql_select_db($database) or die("Unable to select database");

  if(isset($_GET['product'])) {
    addToCart($_GET['product']);
  }

  if(isset($_GET['logOut'])) {
    session_destroy();
    header('location: test.php');
  }

  /*if(isset($_POST['signin'])) {
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
  }*/



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
        <li><a href='test.php?logOut=true'>Sign out</a></li>
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
          <?php 
            if (isset($_SESSION['user'])) {
              echo "Welcome back";
            }
            else {
              echo "<a href='signIn.php'><h5> Sign In/Register </h5></a>" ; 
                }
          ?>

        <div id="content_area">

          <div id="products_display">
            <?php getPro(); ?>
          </div>
      </div>

</body>
</html>
