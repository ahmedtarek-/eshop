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

    if (isset($_GET['remove'])) {
      $user = $_SESSION['user'];
      $id = $_GET['remove'];
      $count = $_GET['quantity'];
      if ($count <= 1) {
        $query = "DELETE FROM cart WHERE user_id = '$user' and product_id = '$id'";
      }
      else {
        $count = $count -1;
        $query = "UPDATE cart SET quantity= '$count' WHERE user_id = '$user' and product_id = '$id'";
  
      }
      mysql_query($query);
      header('location: cart.php');
    }
    if (isset($_GET['checkout'])) {
      checkout($_SESSION['user']);
      header('location: test.php');
    }
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
                            echo "<li><h4> Welcome back</h4> </li>";
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
          

          <div id="products_display">
            <?php getCart($_SESSION['user']);  ?>
          </div>
          <a id="btn" href="cart.php?checkout=true"><h3> Checkout </h3></a> 
      </div>
      
          
        

</body>
</html>
