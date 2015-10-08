<!DOCTYPE>
<?php
  
  include ("functions/functions.php");
  session_start();
  $username="root";
  $password="";
  $database="eshop2";
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

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Eshop Mania</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Eshop Mania</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="test.php">Home</a>
                    </li>
                    <li>
                        <a href="cart.php">Cart</a>
                    </li>
                    <li>
                        <a href="profile.php">My Profile</a>
                    </li>
                    <li>
                      <?php 
                          if (!isset($_SESSION['user'])) {
                              echo "<a href='test.php?logOut=true'>Sign out</a>";
                              }
                       ?>
                    </li>
                    <li>
                      <?php 
                        if (isset($_SESSION['user'])) {
                            echo "<h4 style='text-color: #FFFFFF'>Welcome back</h4>";
                            }
                         else {
                            echo "<a href='signIn.php'>Sign In/Register </a>" ; 
                        }
                     ?>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
          <h1>Profile</h1>
          <h3> <?php  echo $array[0]; ?></h3>
          <h3> Email : <?php  echo $array[1]; ?></h3>
          <h3> First Name: <?php  echo $array[2]; ?></h3>
          <h3> Last Name: <?php  echo $array[3]; ?></h3>
    </div>
          
          
        

</body>
</html>
