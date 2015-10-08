<!DOCTYPE>
<?php

  include ("functions/functions.php");
  $username="root";
  $password="";
  $database="eshop2";
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
      session_start();
      $_SESSION['user'] = signUp($email, $password, $first_name, $last_name, $avatar);
      header('location: test.php');
    }
  }
  else {
    $response = "never entered";
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

  <body>
  <!-- Navigation -->
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
                        <a href="test.php?logOut=true">Sign out</a>
                    </li>
                    <?php 
                        if (isset($_SESSION['user'])) {
                            echo "<li> Welcome back </li>";
                            }
                         else {
                            echo "<li><a href='signIn.php'><h5> Sign In/Register </h5></a></li>" ; 
                        }
                     ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

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
          
    </div>



</body>
</html>
