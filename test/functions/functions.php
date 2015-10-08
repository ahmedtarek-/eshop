<?php

$con = mysqli_connect("localhost","root","","eshop");

//categories

function getCats()
{
  global $con;
  $get_cats = "select * from categories" ;
  $run_cats = mysqli_query($con , $get_cats);

  while ($row_cats= mysqli_fetch_array ($run_cats))

  {
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];

    echo "<li><a href='@'>$cat_title</a></li>";
  }

}
function addToCart($product_id) {
  $user_id = $_SESSION['user'];
  $query = "SELECT quantity from cart where user_id='$user_id' and product_id = '$product_id'";
  $output = mysql_query($query);
  if (is_null($output)) {
    $query = "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`) VALUES ('$user_id','$product_id',1)";
  }
  else {
    $count = mysql_fetch_array($output)[0] +1 ; 
    $query = "UPDATE cart SET quantity= '$count' WHERE user_id = '$user_id' and product_id = '$product_id'";
  }
  mysql_query($query);
}

function checkUser($email) {
  $emails_query = "SELECT password from users where email = '$email'";
  $passwords = mysql_query($emails_query);
  $row = mysql_fetch_array($passwords);
  $correct_password = $row[0];


  if (is_null($correct_password)) {
    return null;
  }
  else {
    return $correct_password;
  }
}

function getId($email) {
  $id_query = "SELECT id from users where email = '$email'";
  $result = mysql_query($id_query);
  $row = mysql_fetch_array($result);
  $id = $row[0];
  return $id;
}
function getProfile($id) {
  $query = "SELECT * from users where id = '$id'";
  $result_query = mysql_query($query);
  $result = mysql_fetch_array($result_query);
  return $result ;
}

function signUp($email, $password, $first_name, $last_name, $avatar) {
  $query = "INSERT INTO Users(`first_name`, `last_name`, `password`, `email`, `avatar`) VALUES ('$first_name','$last_name','$password','$email','null)'";
  $result = mysql_query($query);
}

//Brands

function getBrands()
{
  global $con;
  $get_brands = "select * from brands" ;
  $run_brands = mysqli_query($con , $get_brands);

  while ($row_brands= mysqli_fetch_array ($run_brands))
  {
    $brand_id = $row_brands['brand_id'];
    $brand_title = $row_brands['brand_title'];
    echo "<li><a href='@'>$brand_title</a></li>";
  }

}

function getPro()
{
global $con;
  $get_pro = "select * from products order by RAND() Limit 0,6";
  $run_pro = mysqli_query($con, $get_pro);


while($row_pro=mysqli_fetch_array($run_pro))
{
  $pro_id = $row_pro['product_id'];
  $pro_cat = $row_pro['product_cat'];
  $pro_brand = $row_pro['product_brand'];
  $pro_name = $row_pro['product_name'];
  $pro_price = $row_pro['product_price'];
  $pro_image = $row_pro['product_image'];
  if (isset($_SESSION['user'])) {
    echo " <div id='single_product' >
              <h3>$pro_name</h3> <h5> $$pro_price </h5>
              <a href='test.php?product=$pro_id'> Add to cart </a>
          </div>";
  }
  else {
    echo " <div id='single_product' >
              <h3>$pro_name</h3> <h5> $$pro_price </h5>
          </div>";
  }
  
}
}

?>
