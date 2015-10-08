<!DOCTYPE>
<?php
  
  include ("functions/functions.php");
  session_start();
  $username="root";
  $password="";
  $database="eshop";
  $response="empty";
  $array = "" ;
  mysql_connect("localhost", $username,$password);
  @mysql_select_db($database) or die("Unable to select database");

  if(isset($_SESSION['user'])) {
    $response = "entered";
    $array = getProfile($_SESSION['user']);
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
          <h5> <?php  echo $array[0]; ?></h5>
          <h5> Email : <?php  echo $array[1]; ?></h5>
          <h5> First Name: <?php  echo $array[2]; ?></h5>
          <h5> Last Name: <?php  echo $array[3]; ?></h5>
          
          
        

</body>
</html>
