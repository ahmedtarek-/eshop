<?php

$con = mysqli_connect("localhost","root","","eshop2");

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

function checkout($user_id) {
  $query = "SELECT product_id, quantity FROM cart WHERE user_id = '$user_id'";
  $output = mysql_query($query);
  while($row_pro=mysql_fetch_array($output)) {
    $product_id = $row_pro['product_id'];
    $quantity = $row_pro['quantity'];
    $query = "UPDATE products SET quantity = quantity-'$quantity' WHERE product_id = '$product_id'";
    mysql_query($query);
    $date = date("Y/m/d");
    $query = "INSERT INTO history (`user_id`, `product_id`, `quantity`, `date`) VALUES ('$user_id','$product_id','$quantity','$date')";
    mysql_query($query);
    $query = "DELETE FROM cart WHERE user_id = '$user_id'";
    mysql_query($query);
  } 

}

function getCart($user_id) {
  $query = "SELECT t2.product_name, t2.product_price, t1.quantity, t1.product_id FROM (SELECT product_id, quantity from cart where user_id = '$user_id') as t1 INNER JOIN products as t2 WHERE t1.product_id = t2.product_id";
  $output = mysql_query($query);
  $sum = 0;
  while($row_pro=mysql_fetch_array($output)) {
    $product_id = $row_pro['product_id'];
    $product_name = $row_pro['product_name'];
    $product_price = $row_pro['product_price'];
    $quantity = $row_pro['quantity'];
    $sum = $sum + ($product_price*$quantity);
    echo "<div class='list-group-item' id='single_product' >
              <h3>$quantity x $product_name</h3> <h5> $$product_price </h5>
              <a href='cart.php?remove=$product_id&quantity=$quantity'> remove from cart </a>
          </div>";
  }
  echo "</br><h3>Total is: $".$sum."</h3>";
}

function addToCart($product_id) {
  $user_id = $_SESSION['user'];
  echo "user: ". $user_id;
  echo "product: ". $product_id;
  $query = "SELECT quantity from cart where user_id='$user_id' and product_id = '$product_id'";
  $output = mysql_query($query);
  $count = mysql_fetch_array($output)[0] +1 ;
  if ($count == 1) {
    $query = "INSERT INTO `cart`(`user_id`, `product_id`, `quantity`) VALUES ('$user_id','$product_id',1)";
  }
  else {
    $count = $count + 1;
    echo "count is: ".$count; 
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
  $query = "INSERT INTO users (`first_name`, `last_name`, `password`, `email`, `avatar`) VALUES ('$first_name','$last_name','$password','$email',null)";
  $result = mysql_query($query);
  return getId($email);
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
  $get_pro = "select * from products Limit 0,6";
  $run_pro = mysqli_query($con, $get_pro);


while($row_pro=mysqli_fetch_array($run_pro))
{
  $pro_id = $row_pro['product_id'];
  $pro_cat = $row_pro['product_cat'];
  $pro_brand = $row_pro['product_brand'];
  $pro_name = $row_pro['product_name'];
  $pro_price = $row_pro['product_price'];
  $pro_image = $row_pro['product_image'];
  $quantity = $row_pro['quantity'];
  if (isset($_SESSION['user'])) {
    if ($quantity <1) {
      echo " <div class='col-sm-4 col-lg-4 col-md-4'>
                        <div class='thumbnail'>
                            <img src='$pro_image' alt=''>
                            <div class='caption'>
                                <h4 class='pull-right'>$$pro_price</h4>
                                <h4><a href='#'>$pro_name</a></h4>
                                <p>$pro_cat.</p>
                                <h5> OUT OF STOCK </h5>
                            </div>
                        </div>
                    </div>";
          
    }
    else {
      echo " <div class='col-sm-4 col-lg-4 col-md-4'>
                        <div class='thumbnail'>
                            <img src='$pro_image' alt=''>
                            <div class='caption'>
                                <h4 class='pull-right'>$$pro_price</h4>
                                <h4><a href='#'>$pro_name</a></h4>
                                <p>$pro_cat.</p>
                                <h5> <a href='test.php?product=$pro_id'> Add to cart </a> </h5>
                            </div>
                        </div>
                    </div>";
    }
  }
  else {
    echo " <div class='col-sm-4 col-lg-4 col-md-4'>
                        <div class='thumbnail'>
                            <img src='$pro_image' alt=''>
                            <div class='caption'>
                                <h4 class='pull-right'>$$pro_price</h4>
                                <h4><a href='#'>$pro_name</a></h4>
                                <p>$pro_cat.</p>
                            </div>
                        </div>
                    </div>";
  }
  
}
}

?>
